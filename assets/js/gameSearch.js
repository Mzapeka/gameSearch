$(document).ready(function () {
    $('#search_button').on('click', function (event) {

        event.preventDefault();
        event.stopPropagation();

        let searchString = $('#input').val();
        if (searchString === '') {
            alert({type: 'warning', text: 'Name cann\'t be empty'});
            return;
        }
        $.ajax({
            url: '/gamesearch.php',
            dataType: 'json',
            data: {input: searchString},
            success: function (data) {
                renderGames(data);
            },
            error: function (data) {
                alert({type: 'warning', text: data.responseText});
            }
        });
    });
});

function escapeInput(text)
{
    let entityMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': '&quot;',
        "'": '&#39;',
        "/": '&#x2F;'
    };

    return String(text).replace(/[&<>"',.\/\[\]]/g, function (s) {
        return entityMap[s];
    });
}

function alert(parameters)
{
    let {type, text} = parameters;
    let alert = '<div class="alert alert-' + type + ' alert-dismissable">\n' +
        '  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\n' +
        text + '</div>\n';
    $('div.notification').empty().html(alert);
}

function renderGames(gamesArray)
{
    let gameCardsContainer = $('.content .card-columns');

    gameCardsContainer.empty();

    if (gamesArray instanceof Array) {
        gamesArray.forEach(function (game) {
            let templateHtml = template(game);
            gameCardsContainer.append(templateHtml);
        });
    }
}


function template(gameObj)
{
    return '<div class="card border-primary" id="' + escapeInput(gameObj.id) + '" style="width: 18rem;">\n' +
        '    <img src="' + gameObj.image + '" class="card-img-top" alt="">\n' +
        '    <div class="card-body">\n' +
        '        <h5 class="card-title">Name: ' + escapeInput(gameObj.name) + ' </h5>\n' +
        '    </div>\n' +
        '</div>';
}

