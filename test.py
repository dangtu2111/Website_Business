import requests

url = 'http://127.0.0.1:8000/chats'
headers = {
    'Accept': '*/*',
    'Accept-Language': 'vi,en;q=0.9,en-GB;q=0.8,en-US;q=0.7',
    'Connection': 'keep-alive',
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie': '_ga=GA1.1.2131920656.1734195761; _gcl_au=1.1.417886477.1734195762; _ga_B83KVM1KM5=GS1.1.1734277792.2.0.1734277792.0.0.0; XSRF-TOKEN=eyJpdiI6IlNRTEROZ3p1bCtNcHpOK3hxbk5NekE9PSIsInZhbHVlIjoiYlJualN5czM0VFd2REYrVEw2Yy9aMHQ5YkVVZEJoNEhTTDA2NUFoSS9PWkxhSGQwN29JQ3RiNWNKTytuTzhkaWJYMVh2UUNjcm9FNGluQzQwYlJQRm1uR0FIRXl1MzIxdUtiYllDUUFqcWhva2JQM3hHYUtBcWkrSTM4dithRGMiLCJtYWMiOiIyZWRlYzA1ZGZhMTNkZjAxYWEyMzU0NDM5ODliNGQ0N2YxNWU0NzMzY2E2NDllYWEzZGJkOWRhNzRjMjk3NGQ2IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlZDT1UwRDY1TWlqa2lDTm5OcWlvQlE9PSIsInZhbHVlIjoiaGdyb24rams2YkMzQTJrK1E2aTM0eVRuMnkyb21hSzRCd1pqVmpjZ3JXUUVDcEdxcHkzNFNLVE5XMzh1QWVubDludG9PRzlhNThSblNwWThqaGhoWjNLYWl1TWNiNkNXYnp1QjQvUTliSXAycGdYNFU2TG1TemJRVW9TQmxWUlYiLCJtYWMiOiJhODdiYjM4OTRkYzg2NDRkYzIzZGYyY2MwYzhjYWI3MjM2ZTZhMDg2NTc0MjRiZjdjOTU5OWJkNjc5YzcyYjUwIiwidGFnIjoiIn0%3D',
    'Origin': 'http://127.0.0.1:8000',
    'Referer': 'http://127.0.0.1:8000/client/',
    'Sec-Fetch-Dest': 'empty',
    'Sec-Fetch-Mode': 'cors',
    'Sec-Fetch-Site': 'same-origin',
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0',
    'X-Requested-With': 'XMLHttpRequest',
    'sec-ch-ua': '"Microsoft Edge";v="131", "Chromium";v="131", "Not_A Brand";v="24"',
    'sec-ch-ua-mobile': '?0',
    'sec-ch-ua-platform': '"Windows"'
}

data = {
    'serializedData': 'user_two_name=DANG+TU&user_two_phone=0799721539&user_two_email=anhtuhanam1%40gmail.com&description=&_token=f8MrJ9J0x0xHnHFINR3Qp3uCeCNcTk2xOoIbTYYF'
}

response = requests.post(url, headers=headers, data=data)

# In ra phản hồi từ API
print(response.text)
