alert('test');
var baseUrl =
    {!! json_encode(url('/')) !!}
var isLoggedIn = <?php echo json_encode(Auth::check()); ?>;
if (isLoggedIn == true) {
    var cbNotificationCount = function (response) {
        var res = response;
        var count = res.count;
        $('.noti-count').text(count);
    };

    var cbNotificationList = function (response) {
        renderNotificationList(response);
    };

    var getNotificationCountUrl = baseUrl + '/get-notification-count';
    var getNotificationListUrl = baseUrl + '/get-notification-list';

    var notificationCount = function () {
        $.get(getNotificationCountUrl, data, cbNotificationCount);
    };

    var interval = 1000 * 60 * 3;

    var fetchNotificationList = function () {
        $.get(getNotificationListUrl, data, cbNotificationList);
    };

    var renderNotificationList = function (response) {
        console.log(response);
        var notificationCollection = response.data;
        var topLevelItemUl = $('.notification');
        var notificationBody = $(topLevelItemUl).find('.body');
        var notificationMenu = $(notificationBody).find('.menu');
        notificationMenu.empty();
        for (var i in notificationCollection) {
            var currentNotification = notificationCollection[i];
            var li = $('<li>');
            var a = $('<a href="' + currentNotification.href + '" class="waves-effect waves-block">');
            var messageWrapperDiv = $('<div class="menu-info">');
            var h4 = $('<h4>');
            var p = $('<p>');
            var iconTimeHistory = $('<i class="material-icons">');

            var durationToSubtract = 6;
            var updatedAt = moment(currentNotification.updated_at);
            var now = moment();
            updatedAt = updatedAt.add(durationToSubtract, 'hours');
            var durationSinceLastUpdate = moment.duration(now.diff(updatedAt)).humanize();

            iconTimeHistory.append('access_time');
            p.append(iconTimeHistory);
            p.append(durationSinceLastUpdate);


            h4.append(currentNotification.message);
            messageWrapperDiv.append(h4);
            messageWrapperDiv.append(p);


            a.append(messageWrapperDiv);
            li.append(a);
            notificationMenu.append(li);
        }
    };

    $(document).ready(function () {
        notificationCount();
        setInterval(notificationCount, interval);

        $('.noti-bell').on('click', function (evt) {
            alert('test');
            fetchNotificationList();
        });
    });
}
