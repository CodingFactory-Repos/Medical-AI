// Chatbox.ts
// Created by Louis on 08/03/2022.
// On form submit .chatbox-send button
var isNameEntered = true;
var canBotRespond = false;
var chatboxName = "";
$('.chatbox-send').click(function() {
    console.log(isNameEntered);

    // If it's the first message get the name of the user

    var message = $('.chatbox-input').val();
    if (message.length > 0) {
        if (!isNameEntered) {
            console.log(message);
            if (message.indexOf(' ') == -1 || message.indexOf(' ') == message.length - 1) {
                if (message.indexOf(' ') == message.length - 1 || message.includes('.')) {
                    chatboxName = message
                    if (message.indexOf(' ') == message.length - 1) {
                        chatboxName = message.split(' ')[0];
                    }
                    if (message.includes('.')) {
                        chatboxName.substring('.');
                    }

                } else {
                    chatboxName = message;
                }
                console.log(chatboxName);
            }

        } else if (!isNameEntered) {
            console.log(message.indexOf(' '))
        }


        $('.chatbox-input').val('');
        $('.chatbox-message-content').append("<p class=\"UserMessage\">You : ".concat(message, "</p>"));
        console.log('Envoi du message : ' + message);
        // Send message to IA


        if (isNameEntered) {
            $.ajax({
                url: '<?= URL_ROOT ?>/api/ai?query=' + message + '&name=' + chatboxName,
                type: 'GET',
                dataType: 'json',

                success: function(data) {
                    console.log("coucou")
                    var response = data[0]['a_text_history'];
                    console.log('Réponse de l\'IA : ' + response);
                    // Add message to chatbox
                    $('.chatbox-message-content').append("<p class=\"AIMessage\">".concat(response, "</p>"));
                }


            });
        }
        if (!isNameEntered) {
            chatboxName = message;
            isNameEntered = true;
        }


    }


    console.log(message.indexOf(' '));



});
$('.chatbox-close').on('click', function(e) {
    e.preventDefault();
    $('.chatbox').fadeOut(300);
    $('.fa-robot').fadeIn(300);

    $('.fa-robot').css('zIndex', '49');

    $('.fa-robot').css('opacity', '1');
    // console.log($('.fa-robot').css('display'));


});
$('.fa-robot').click(function() {
    $('.chatbox').fadeIn(300);
    $('.fa-robot').fadeOut(300);
    $('.chatbox').css('zIndex', '50');
    $('.chatbox').css('opacity', '1');
    $('.fa-robot').css('zIndex', '49');
    $('.fa-robot').css('opacity', '0');
    // console.log($('.fa-robot').css('display'));

});