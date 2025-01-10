(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('element/locale/en', ['module', 'exports'], factory);
  } else if (typeof exports !== "undefined") {
    factory(module, exports);
  } else {
    var mod = {
      exports: {}
    };
    factory(mod, mod.exports);
    global.ELEMENT.lang = global.ELEMENT.lang || {}; 
    global.ELEMENT.lang.en = mod.exports;
  }
})(this, function (module, exports) {
  'use strict';

  exports.__esModule = true;
  exports.default = {
    el: {
      colorpicker: {
        confirm: 'OK',
        clear: 'Delete'
      },
      datepicker: {
        now: 'Current',
        today: 'Today',
        cancel: 'Cancel',
        clear: 'Delete',
        confirm: 'OK',
        selectDate: 'Select day',
        selectTime: 'Select hour',
        startDate: 'Day begin',
        startTime: 'Time begin',
        endDate: 'Day end',
        endTime: 'Time end',
        prevYear: 'Last year',
        nextYear: 'Next year',
        prevMonth: 'Last month',
        nextMonth: 'Next mont',
        year: 'Year',
        month1: 'Month 1',
        month2: 'Month 2',
        month3: 'Month 3',
        month4: 'Month 4',
        month5: 'Month 5',
        month6: 'Month 6',
        month7: 'Month 7',
        month8: 'Month 8',
        month9: 'Month 9',
        month10: 'Month 10',
        month11: 'Month 11',
        month12: 'Month 12',
        // week: 'week',
        weeks: {
          sun: 'Sun',
          mon: 'Mon',
          tue: 'Tue',
          wed: 'Web',
          thu: 'Thu',
          fri: 'Fri',
          sat: 'Sat'
        },
        months: {
          jan: 'M.1',
          feb: 'M.2',
          mar: 'M.3',
          apr: 'M.4',
          may: 'M.5',
          jun: 'M.6',
          jul: 'M.7',
          aug: 'M.8',
          sep: 'M.9',
          oct: 'M.10',
          nov: 'M.11',
          dec: 'M.12'
        }
      },
      select: {
        loading: 'Loading',
        noMatch: 'Inappropriate data',
        noData: 'No data found',
        placeholder: 'Select'
      },
      cascader: {
        noMatch: 'Inappropriate data',
        loading: 'Đang tải',
        placeholder: 'Select',
        noData: 'No data found'
      },
      pagination: {
        goto: 'Jump to',
        pagesize: '/page',
        total: 'Total {total}',
        pageClassifier: ''
      },
      messagebox: {
        title: 'Notify',
        confirm: 'OK',
        cancel: 'Cancel',
        error: 'Invalid data'
      },
      upload: {
        deleteTip: 'Click delete',
        delete: 'Delete',
        preview: 'Preview',
        continue: 'Continue'
      },
      table: {
        emptyText: 'No data',
        confirmFilter: 'Confirm',
        resetFilter: 'Refresh',
        clearFilter: 'Delete all',
        sumText: 'Total'
      },
      tree: {
        emptyText: 'No data'
      },
      transfer: {
        noMatch: 'Inappropriate data',
        noData: 'No data found',
        titles: ['List 1', 'List 2'],
        filterPlaceholder: 'Enter keywords',
        noCheckedFormat: '{total} item',
        hasCheckedFormat: '{checked}/{total} Selected '
      },
      image: {
        error: 'FAILED' // to be translated
      },
      pageHeader: {
        title: 'Back' // to be translated
      }
    }
  };
  module.exports = exports['default'];
});