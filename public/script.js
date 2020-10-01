// Get game feedbacks
$(document).ready(function () {

    $('.game').on('click', function () {
        const feedbackContainer = $(".feedback-container");
        const gameId = $(this).data('id');

        $.ajax({
            url: '/feedbacks',
            method: 'GET',
            dataType: 'JSON',
            data: {
                id: gameId
            },
            success: function (data) {
                feedbackContainer.html('');

                if (data.length < 1) {
                    feedbackContainer.html('<h3 class="text-warning text-center w-100">No result</h3>');
                }

                for (const dataKey in data) {
                    let modelBox = generateFeedbackCard(data[dataKey]);
                    feedbackContainer.append(modelBox);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });


// Game search from appstore
    let timer = null;

    $('#search-input').on('keyup', function () {
        let game = $(this).val();
        let gamesContainer = $('.games-container')

        $('.search-icon-box .search-icon').addClass('d-none')
        $('.search-icon-box .spinner').removeClass('d-none');

        clearTimeout(timer);
        timer = setTimeout(function () {
            $.ajax({
                url: '/games',
                method: 'GET',
                dataType: 'JSON',
                data: {
                    game: game
                },
                success: function (data) {
                    $('.search-icon-box .search-icon').removeClass('d-none')
                    $('.search-icon-box .spinner').addClass('d-none');

                    gamesContainer.html('');

                    if (data.length < 1) {
                        gamesContainer.html('<h3 class="text-warning text-center w-100">No result</h3>');
                    }

                    for (const dataKey in data) {
                        let gameBox = generateGameBox(data[dataKey]);
                        gamesContainer.append(gameBox);
                    }
                },
                error: function (err) {
                    gamesContainer.html('<h3 class="text-warning text-center w-100">No result</h3>');

                    $('.search-icon-box .search-icon').removeClass('d-none')
                    $('.search-icon-box .spinner').addClass('d-none');
                }
            });
        }, 500);
    });

    $(document.body).on('click', '.game-title', function (e) {
        let gameUrl = $(this).data('url');
        let descriptionBox = $($(this).attr('href'));

        $.ajax({
            url: '/game-details',
            method: 'GET',
            dataType: 'JSON',
            data: {
                url: gameUrl
            },
            success: function (data) {
                descriptionBox.html('');

                let gameDetailBox = generateGameDetailsBox(data);
                descriptionBox.append(gameDetailBox);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
});

function generateFeedbackCard(feedback) {
    return '<div class="card mb-3">\
                <div class="card-header bg-primary text-white">\
                ' + feedback.player_name + ' [' + feedback.player_id + ']\
                </div>\
                <div class="card-body">' + feedback.feedback + '</div>\
                <div class="card-footer">\
                <span>' + feedback.game_name + ' [' + feedback.game_id + ']</span>\
                <span class="text-info">(v' + feedback.game_version + ')</span>\
                </div>\
            </div>';
}

function generateGameBox(game) {
    return '<div class="row mb-3 game-box">\
            <div class="d-flex flex-row">\
                <div class="mr-3">\
                    <img class="rounded-circle" src="' + game.img + '"\ alt="" width="100px">\
                </div>\
                <div>\
                    <h3 class="title">\
                        <a href="#game-description-' + game.id + '" class="game-title" data-url="' + game.url + '"\
                         data-toggle="collapse" role="button" aria-expanded="false" \
                         aria-controls="game-description-' + game.id + '">' + game.title + '</a>\
                    </h3>\
                    <p>' + game.description + '</p>\
                    <div class="game-box-body collapse card card-body" id="game-description-' + game.id + '">\
                      <div class="spinner text-primary spinner-border" role="status"></div>\
                    </div>\
                </div>\
            </div>\
        </div>';
}

function generateGameDetailsBox(details) {
    return '<p><b>Developer:</b> ' + details.developer + '</p>\
            <p><b>Rating:</b> ' + details.rating + '</p>\
            <p><b>Price:</b> ' + details.price + '</p>\
            <p><b>Appstore URL:</b> <a target="_blank" href="' + details.url + '">' + details.url + '</a></p>\
            <p class="mb-0"><b>Most used words:</b></p>\
            <div>' + details.keywords.map(generateTag).join('') + '</div>';
}

function generateTag(keyword) {
    return '<span class="badge badge-pill badge-primary mr-1">' + keyword + '</span>';
}

