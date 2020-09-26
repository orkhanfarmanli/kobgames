$('.game').on('click', function () {
    const feedbackContainer = $(".feedback-container");
    const gameId = $(this).data('id');

    $.ajax({
        url: '/games',
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

function generateFeedbackCard(data) {
    return '<div class="card mb-3">\
                <div class="card-header bg-primary text-white">\
                '+ data.player_name +' ['+ data.player_id +']\
                </div>\
                <div class="card-body">'+data.feedback+'</div>\
                <div class="card-footer">\
                <span>'+data.game_name+' ['+ data.game_id +']</span>\
                <span class="text-info">(v'+data.game_version+')</span>\
                </div>\
            </div>';
}