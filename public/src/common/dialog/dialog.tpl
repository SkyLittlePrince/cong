<div class="gray-bg"></div>
<div class="dialog">
    <div class="dialog-banner">
        <span class="ui-dialog-title"><%= title%></span>
        <a href="javascript:void(0)" class="close-button">
            <img src="/images/icon/close-btn.gif">
        </a>
    </div>
    <div class="dialog-content">
        <%= content%>
    </div>
    <div class="dialog-footer">
        <div class="buttonset">
            <% _.forEach(buttons, function(button) {
                 %><span class="btn dialog-btn <%- button.className %>"><%- button.text %></span><% 
            }); %>
        </div>
    </div>
</div>