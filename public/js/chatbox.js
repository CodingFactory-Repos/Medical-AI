// Chatbox.ts
// Created by Louis on 08/03/2022.
// On form submit .chatbox-send button
$('.chatbox-send').click(function() {
    var isNameEntered = false;
    // If it's the first message get the name of the user

    var message = $('.chatbox-input').val();
    $('.chatbox-input').val('');
    $('.chatbox-message-content').append("<p class=\"UserMessage\">Vous : ".concat(message, "</p>"));
    console.log('Envoi du message : ' + message);
    // Send message to IA
    $.ajax({
        url: '<?= URL_ROOT ?>/api/ai?query=' + message + '&name=' + chatboxName,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var response = data[0]['a_text_history'];
            console.log('Réponse de l\'IA : ' + response);
            // Add message to chatbox
            $('.chatbox-message-content').append("<p class=\"AIMessage\">".concat(response, "</p>"));
        }
    });
    if (!isNameEntered) {
        console.log(message);
        if (message.indexOf(' ') == -1 || message.indexOf(' ') == message.length - 1) {
            var chatboxName = message;
            $('.chatbox-message-content').append("<p class=\"AIMessage\">Docteur HeyMedical : Bonjour " + chatboxName + ", Quel est votre problème ?</p>");
            isNameEntered = true;
            console.log(chatboxName);

        } else {
            console.log(message.indexOf(' '))
            $('.chatbox-message-content').append("<p class=\"AIMessage\">Docteur HeyMedical : Veuillez uniquement rentrer votre prénom</p>");
        }
        console.log(message.indexOf(' '));
    }


});