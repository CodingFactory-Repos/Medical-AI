// Chatbox.ts
// Created by Louis on 08/03/2022.

// On form submit .chatbox-send button
$('.chatbox-send').click(function () {
    let message : any = $('.chatbox-input').val();
    $('.chatbox-input').val('');

    $('.chatbox-message-content').append(`<p class="UserMessage">Vous : ${message}</p>`);

    console.log('Envoie du message : ' + message);

    // Send message to IA
    $.ajax({
        url: '<?= URL_ROOT ?>/api/ai?query=' + message + '&name=Guillaume',
        type: 'GET',
        dataType: 'json',

        success: function (data : string) {
            let response : string = data[0]['a_text_history'];
            console.log('Réponse de l\'IA : ' + response);

            // Add message to chatbox
            $('.chatbox-message-content').append(`<p class="AIMessage">${response}</p>`);
        }
    })
});