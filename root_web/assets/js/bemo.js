//Jquery for Bemo
$(document).ready( function () {
    $('.campaign-artist-vote').click( function() {
        var round = $(this).find('.vote-artist').attr('data-round');
        var artist = $(this).find('.vote-artist').attr('data-artistid');
        var campaign = $(this).find('.vote-artist').attr('data-campaignid');
        var protocol = window.location.protocol;
        var hostURL = window.location.host;
        
        $.ajax({
            type: "POST",
            url: protocol + "//" + hostURL + "/web/vote/",
            data: {
                artist_id : artist,
                campaign_id : campaign,
                round_id : round
            },
            success: function (result) {
                if (result=="TRUE") {
                    $('.campaign-artist-vote')
                    .find("[data-artistid='"+artist+"'].[data-round='"+round+"'].[data-campaignid='"+campaign+"']")
                    .html(":)").parent().addClass('vote-success');
                } else {
                    $('.campaign-artist-vote')
                    .find("[data-artistid='"+artist+"'].[data-round='"+round+"'].[data-campaignid='"+campaign+"']")
                    .html(":(").parent().addClass('vote-failure');
                }
            }
        })
    })
})