(function () {
  var Util = window.Util = function () {
  };

  Util.calcAge = function (birthdate) {
    var today = new Date;

    birthdate = birthdate.getFullYear()
                + ('0' + (birthdate.getMonth() + 1)).slice(-2)
                + ('0' + birthdate.getDate()).slice(-2);

    today = today.getFullYear()
            + ('0' + (today.getMonth() + 1)).slice(-2)
            + ('0' + today.getDate()).slice(-2);

    return Math.floor((parseInt(today) - parseInt(birthdate)) / 10000);
  };

  Util.getDayOfTheWeek = function (date) {
    var data = [ '日', '月', '火', '水', '木', '金', '土'];
    return data[date.getDay()];

  };

  Util.getZodiacSign = function (date) {
      var date = ((date.getMonth() + 1) * 100)
                 + date.getDate();

      var data = [
        [  101,  120, '山羊座', 'Capricorn'   ],
        [  121,  219, '水瓶座', 'Aquarius'    ],
        [  220,  320, '魚座',   'Pisces'      ],
        [  321,  420, '牡羊座', 'Aries'       ],
        [  421,  520, '牡牛座', 'Taurus'      ],
        [  521,  621, '双子座', 'Gemini'      ],
        [  622,  723, '蟹座',   'Cancer'      ],
        [  724,  823, '獅子座', 'Leo'         ],
        [  824,  923, '乙女座', 'Virgo'       ],
        [  924, 1023, '天秤座', 'Libra'       ],
        [ 1024, 1122, '蠍座',   'Scorpio'     ],
        [ 1123, 1222, '射手座', 'Sagittarius' ],
        [ 1223, 1231, '山羊座', 'Capricorn'   ],
      ];

      for (var i in data) {
        var values = data[i];

        if (values[0] <= date && date <= values[1]) {
          return values[2];
        }
      }

      return null;
  };

  Util.getJapanCalendar = function (date) {
    var year = date.getFullYear()
    var param;
    if (year > 1988) {
      param = year - 1988;
      param = '平成' + param + '年';
      return param;
    }else if (year > 1925) {
      param = year - 1925;
      param = '昭和' + param + '年';
      return param;
    }else if (year > 1911) {
      param = year - 1911;
      param = '大正' + param + '年';
      return param;
    }else if (year > 1867) {
      param = year - 1867;
      param = '明治' + param + '年';
      return param;
    }else{
      return '該当なし';
    }
  };

})();

$(document).ready(function () {
  $('input:not([type=hidden])').attr('autocomplete', 'off');

  $('.table-sortable').each(function () {
    $(this).find('thead > tr > th').each(function () {
      var th = $(this);
      var a = th.find('a');
      var href = a.attr('href');

      if (a.hasClass('asc')) {
        th.addClass('selected');
      } else if (a.hasClass('desc')) {
        th.addClass('selected');
        a.attr('href', href.replace(/&?sort=.+&direction=(asc|desc)/, '')
                           .replace(/\?$/, ''));
      }

      th.on('click', function () {
        var href = th.find('a').attr('href');

        if (href) {
          location = href;
        }
      });
    });
  });

  $('.table-linkable tbody > tr').each(function () {
    var tr = $(this);
    var a = tr.find('a');

    if (a) {
      tr.on('click', function () {
        location = a.attr('href');
      });
    }
  });
});
