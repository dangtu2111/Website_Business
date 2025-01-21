<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuGroup;
use App\Models\MenuLink;
use Illuminate\Support\Facades\File;


class MenuController extends Controller
{
    public function menu(){
        $template = 'backend.interface.menu';
        $config['method']='create';
        $config['js'] = [
            'Backend/js/menu/menu.js',
        ];
        $filePath = public_path('Backend/js/menu/menu.json');
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }
        $menus = json_decode(File::get($filePath), true);
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact( 'template','config','menus'));
    }
    public function getMenu(){
        $filePath = public_path('Backend/js/menu/menu.json');
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }
        $menus = json_decode(File::get($filePath), true);
        return response()->json(['success' => 'lấy dữ liệu thành công',"menus"=>$menus], 200);
    }
    public function deleteMenu($object, $keyToFind){
        
        // Sao chép mảng ban đầu để không thay đổi mảng gốc
        $newObject = $object; 
    
        // Duyệt qua các phần tử trong mảng
        foreach ($newObject as $key => $value) {
            if ($key === $keyToFind) {
                if (isset($newObject[$key]['child']) && is_array($newObject[$key]['child'])) {
                    // Giữ lại các giá trị trong 'child'
                    $childValues = $newObject[$key]['child'];
                    
                    // Thêm các giá trị trong 'child' vào $newObject
                    foreach ($childValues as $childKey => $childValue) {
                        $newObject[$childKey] = $childValue;
                    }
                }
                unset($newObject[$key]);
                return $newObject; // Trả về mảng đã thay đổi
            }
    
            // Nếu phần tử là mảng hoặc đối tượng, tiếp tục tìm kiếm
            if (is_array($value) || is_object($value)) {
                // Gọi đệ quy để sao chép và thay đổi phần tử con
                $result = $this->deleteMenu($value, $keyToFind);
                if ($result !== null) {
                    // Gán lại kết quả sau khi thay đổi
                    $newObject[$key] = $result;
                }
            }
        }
        
        return $newObject; // Nếu không tìm thấy key
    }
    public function menu_delete($id){
        $filePath = public_path('Backend/js/menu/menu.json');
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }
        $jsonData = json_decode(File::get($filePath), true);
        $newArr=$this->deleteMenu($jsonData,$id);
     
        File::put($filePath, json_encode($newArr, JSON_PRETTY_PRINT));
        return response()->json([
            'success' => 'Đã thay đổi  thành công',
        ], 200);
    }
    public function menu_insert_post(Request $request){
        
        $filePath = public_path('Backend/js/menu/menu.json');
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }
        $jsonData = json_decode(File::get($filePath), true);
        $section = $request->input('name');
     
        if($request->input('id')!=null){
            $newArr=$this->editLink($jsonData,$request->input('id'),$request->input('name'),$request->input('link'));

            File::put($filePath, json_encode($newArr, JSON_PRETTY_PRINT));

            return response()->json([
                'success' => 'Đã thay đổi  thành công',
                'message' => 'Menu link created successfully.',
                'name'=>$request->input('name'),
                'id'=>$request->input('id')
            ], 200);
        }
        $key = strtolower($section);  // Chuyển thành chữ thường
        $key = preg_replace('/[^a-z0-9\s-]/', '', $section);  // Loại bỏ ký tự đặc biệt
        $key = preg_replace('/\s+/', '-', $section);  
        $key = $key.rand(0, 999);
        if (!isset($jsonData[$key])) {
            
            $jsonData[$key]['name'] = $request->input('name');
            $jsonData[$key]['link'] = $request->input('link');
            $link=$jsonData[$key];
            // Lưu lại nội dung vào file JSON
            File::put($filePath, json_encode($jsonData, JSON_PRETTY_PRINT));

            return response()->json(['success' => 'Đã thêm thành công','message' => 'Menu link created successfully.',
            'link'=>$link], 200);
        } else {
            return response()->json(['error' => 'Section không tồn tại'], 404);
        }
        
    }
    public function editGroup($object, $keyToFind,$name) {
        $newObject = $object; 
    
        // Duyệt qua các phần tử trong mảng
        foreach ($newObject as $key => $value) {
            if ($key === $keyToFind) {
                // Thay đổi giá trị của key cần tìm
                $newObject[$key]['name'] = $name;
                $newObject[$key]['child'] = $value['child'];
                return $newObject; // Trả về mảng đã thay đổi
            }
    
            // Nếu phần tử là mảng hoặc đối tượng, tiếp tục tìm kiếm
            if (is_array($value) || is_object($value)) {
                // Gọi đệ quy để sao chép và thay đổi phần tử con
                $result = $this->editGroup($value, $keyToFind,$name);
                if ($result !== null) {
                    // Gán lại kết quả sau khi thay đổi
                    $newObject[$key] = $result;
                }
            }
        }
        
        return $newObject; 
        
    }
    public function editLink($object, $keyToFind, $name, $link) {
        // Sao chép mảng ban đầu để không thay đổi mảng gốc
        $newObject = $object; 
    
        // Duyệt qua các phần tử trong mảng
        foreach ($newObject as $key => $value) {
            if ($key === $keyToFind) {
                // Thay đổi giá trị của key cần tìm
                $newObject[$key]['name'] = $name;
                $newObject[$key]['link'] = $link;
                
                return $newObject; // Trả về mảng đã thay đổi
            }
    
            // Nếu phần tử là mảng hoặc đối tượng, tiếp tục tìm kiếm
            if (is_array($value) || is_object($value)) {
                // Gọi đệ quy để sao chép và thay đổi phần tử con
                $result = $this->editLink($value, $keyToFind, $name, $link);
                if ($result !== null) {
                    // Gán lại kết quả sau khi thay đổi
                    $newObject[$key] = $result;
                }
            }
        }
        
        return $newObject; // Nếu không tìm thấy key
    }
    
    public function menu_insert_group(Request $request){

        $filePath = public_path('Backend/js/menu/menu.json');
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }
        $jsonData = json_decode(File::get($filePath), true);
        $section = $request->input('name');
        if($request->input('id')!=null){
            $newArr=$this->editGroup($jsonData,$request->input('id'),$request->input('name'));
            File::put($filePath, json_encode($newArr, JSON_PRETTY_PRINT));

            return response()->json([
                'success' => 'Đã thay đổi  thành công',
                'message' => 'Menu link created successfully.',
                'name'=>$request->input('name'),
                'id'=>$request->input('id')
            ], 200);
        }
        $key = strtolower($section);  // Chuyển thành chữ thường
        $key = preg_replace('/[^a-z0-9\s-]/', '', $section);  // Loại bỏ ký tự đặc biệt
        $key = preg_replace('/\s+/', '-', $section);  
        $key = $key.rand(0, 999);

        if (!isset($jsonData[$key])) {
            
            $jsonData[$key]['name'] = $request->input('name');
           
            $link=$jsonData[$key];
            // Lưu lại nội dung vào file JSON
            File::put($filePath, json_encode($jsonData, JSON_PRETTY_PRINT));

            return response()->json(['success' => 'Đã thêm thành công','message' => 'Menu link created successfully.',
            'group'=>$link], 200);
        } else {
            return response()->json(['error' => 'Section không tồn tại'], 404);
        }
    }
    public function findKeyInObject($object, $keyToFind) {
        foreach ($object as $key => $value) {
            if ((string) $key === $keyToFind) {
                return $value; // Trả về giá trị tương ứng với key
            }
            
            if (is_array($value) || is_object($value)) {
                // Tiếp tục tìm trong phần tử con nếu là mảng hoặc đối tượng
                $result = $this->findKeyInObject($value, $keyToFind);
                if ($result !== null) {
                    return $result;
                }
            }
        }
        return null; // Không tìm thấy key
    }
 
    function traverseArray($array, $jsonData) {
        $output = []; // Kết quả sau khi xử lý
    
        foreach ($array as $item) {
            // Nếu phần tử là một mảng
            if (is_array($item)) {
                if (count($item) == 2) {
                    // Phần tử có cha và con
                    $parentKey = $item[0]; // Cha (ví dụ: "home", "about")
                    $childArray = $item[1]; // Mảng con (ví dụ: ["concon"], ["concon11", "aaaaaaaaaaaa"])
    
                    // Tìm dữ liệu trong JSON hoặc tạo dữ liệu mặc định
                    $output[$parentKey] = $this->findKeyInObject($jsonData, $parentKey);
    
                    // Nếu tồn tại mảng con, gọi đệ quy để xử lý
                    if (is_array($childArray)) {
                        $output[$parentKey]['child'] = $this->traverseArray($childArray, $jsonData);
                    }
                } else {
                    // Trường hợp mảng không đủ 2 phần tử
                    foreach ($item as $value) {
                        $output[$value] = $this->findKeyInObject($jsonData, $value);
                    }
                }
            } else {
                // Nếu phần tử là giá trị đơn
                // dd(''. $item);
                // dd('fasdf'. json_encode($jsonData));
                $output[$item] = $this->findKeyInObject($jsonData, $item);
            
            }
        }
    
        return $output;
    }
    
    
    public function menu_update(Request $request)
    {
        // Đường dẫn tới tệp JSON
        $filePath = public_path('Backend/js/menu/menu.json');
        
        // Kiểm tra nếu tệp không tồn tại
        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File JSON không tồn tại'], 404);
        }

        // Đọc nội dung tệp JSON
        $jsonData = json_decode(File::get($filePath), true);

        // Dữ liệu từ request
        $input = $request->input('data');

        // Gọi hàm traverseArray để xử lý dữ liệu
        $updatedData = $this->traverseArray($input, $jsonData);

        
        // Ghi dữ liệu mới vào tệp JSON
        File::put($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));

        // Trả về phản hồi thành công
        return response()->json(['message' => 'Cập nhật menu thành công'], 200);
    }


}
