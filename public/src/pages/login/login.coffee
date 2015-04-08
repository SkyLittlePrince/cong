$ ->
  $('#login-btn').on "click", (event) ->
    event.preventDefault()
    email_or_mobile = $('#loginname').val()
    data =
      password: $('#password').val()
      captcha: $('#authcode').val()

    if is_email email_or_mobile
      data.email = email_or_mobile
    else
  	  data.mobile = email_or_mobile

    $.ajax
      url: '/login'
      type: 'POST'
      data: data
      dataType: 'json'
      error: (jqXHR, textStatus, errorThrown) ->
        alert '系统错误, 请稍后重试'
      success: (data, textStatus, jqXHR) ->
        alert data
      

is_email = (str) ->
  reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
  reg.test(str);