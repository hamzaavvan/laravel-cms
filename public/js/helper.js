function capWord(string) 
{
  if (string.length > 0) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
}

function redirect(to, params = {}) {
  var target = url(to, params);

  window.location.href = target;
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return;
}


function today() {
  var today = new Date();
    var dd = today.getDate(),
      mm = today.getMonth()+1,
      yyyy = today.getFullYear(),
      hours = today.getHours(),
      mins = today.getMinutes(),
      secs = today.getSeconds();

    if(dd<10) {
      dd='0'+dd
    } 

  if(mm<10) {
     mm='0'+mm
  } 

  return yyyy+'-'+mm+'-'+dd+' '+hours+':'+mins+':'+secs;
}

function url(to, params = {}) {
  var url = "admin.php?sec="+to;

  for (var prop in params) {
    url = url + '&'+prop+'='+params[prop];
  }

  return url;
}

function filename()
{
  var url = window.location.pathname;
  var lastUri = url.substring(url.lastIndexOf('/')+1);

  if(lastUri.indexOf('?')!= -1)
   return lastUri.substring(0,lastUri.indexOf('?'));
  else
   return lastUri;
}

function getParam(name) {
   var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === name) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}

function attributes(el, attrs) {
  for(var key in attrs) {
      el.setAttribute(key, attrs[key]);
  }
}

function roundbtn(btn) {
  btn.dataID = typeof btn.dataID != 'undefined' ?"data-id="+btn.dataID+"" :"";
  btn.attr = typeof btn.attr != 'undefined' ?btn.attr:'';

  var save = "<button "+btn.dataID+" "+btn.attr+" class=\""+btn.classname+" btn btn-sm rad-100 rad-100\">";
  save += "<i title="+btn.title+" class=\"glyphicon glyphicon-"+btn.ico+"\">";
  save += "</i></button>";

  return save;
}

function salert(attr) {
  var html = "<div class=\"alert alert-"+attr.type+" alert-dismissible\">"
    html += "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>";
    html += "<h4 style=\"margin: 0\"><i class=\"icon fa fa-"+attr.ico+"\"></i> "+attr.head+"</h4>";
    html += exists(attr.message);
    html += "</div>";

  return html;
}

function exists(value) {
  if (typeof value != 'undefined') {
    return value
  }
}

function thumbnails(url, path, dropzone) {
      $.get(url, {path: path}, function(data) {
            var reader = new FileReader();

            $.each(data['images'], function(key, value){
                var mockFile = { name: value.name, size: value.size, };

                dropzone.options.addedfile.call(dropzone, mockFile);

                dropzone.options.thumbnail.call(dropzone, mockFile, data.dest+value.display);

                $('.loader').remove();

            });
      });
}

function box(contents, type) {
  if (typeof contents=='object') {
    var act = ['default', 'warning', 'primary', 'info', 'success', 'danger'];
    var title   = contents[0];
    var message = contents[1];
    var border = '';
    var box = 'default';

    if (typeof type=='object') {
      if (type.border==='solid') {
        border = 'box-solid ';
      }
      
      if ($.inArray(type.box, act)) {
        box = type.box;
      }
    }

    var $html = '<div id="box-alert" class="box '+border+'box-'+box+'">';
    $html += '<div class="box-header with-border">';
    $html += '<h3 class="box-title">'+title+'</h3>';
    $html += '</div><!-- /.box-header -->';
    $html += '<div class="box-body">'
    $html +=  message;
    $html += '</div><!-- /.box-body -->'
    $html += '</div>';

    return $html;
  }
}

function readURL(input, callback, elm) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          callback(e, elm);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function imgUploaderDefaults($this) {
    if ($this.val().length>0) {
        if (!$this.val().match(/\.(jpg|jpeg|png)$/i)) {
            alert('Oops ! The file is not a supported image type');
            return false;
        }

        $this.parent('div.control').hide();

        readURL(this, function (e) {
            var $img = $('.preview img');

              var html = '<div class="img">'+
                         '<img data-source="product" src="'+e.target.result+'">'+
                         '</div>';
                  html += '<button class="btn btn-default cancel">Cancel</button>';


              $('.preview').html(html);

              $('.cancel').on('click', function() {
                  $('.preview').html('');
                  $('.control').show();
              });
        });
    }
}

function isEmpty($this, callback) {
      $this = $this.children('input, textarea');

      if($this.val().length >0) {
          $('#add').removeAttr('disabled');
          $('#save').removeAttr('disabled');
          $('#update').removeAttr('disabled');
          $('#pd-img').removeAttr('disabled');
          $('label[for="pd-img"]').css('cursor', 'pointer');

          if (typeof callBack == 'function')
            callback();
      }
}

function setOverlay(selector) {
  var loader = '<div class="overlay">';
  loader += '<i class="fa fa-refresh fa-spin"></i>';
  loader += '</div>';

  $(selector).append(loader);
}