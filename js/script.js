
Chat = {
    Models: {},
    Collections:{},
    Views:{},
    Router:{}
};

 Chat.Models.message = Backbone.Model.extend({
    phrase_id: '',
    admin_user: '',
    text: '',
    time: ''
});

Chat.Collections.messageCollection = Backbone.Collection.extend({
    model: Chat.Models.message,
    url: '/talk/list'
});


Chat.Views.messageList = Backbone.View.extend({
    el: '#chat',
    initialize: function() {},
    render:function(){
        this.collection.each(this.addOne, this);
        return this;
    },
   parse: function(response){
        console.log (response);
        return response;
    },
    addOne: function(message){
        var single = new Chat.Views.message({model: message});
        this.$el.append(single.render().el);
    }
});

Chat.Views.message = Backbone.View.extend({
    tagName: "li",
    template: _.template(jQuery("#chat-line").html()),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    }
})



var messageList = new Chat.Collections.messageCollection();

setInterval('getMessages()', 1000);

function getMessages(){
    var messageWindow = jQuery('#chat');
    var lastMessageId = messageList.length > 0 ? messageList.last().get('phrase_id') : 0;
    var options = { data: {message_id: lastMessageId}, success: function(){
        if(currentMessageList.length > 0){
            new Chat.Views.messageList({collection: currentMessageList}).render();
            messageWindow.scrollTop(messageWindow.children().last().offset().top - messageWindow.offset().top);
            currentMessageList.each(function(mess){
                messageList.add(mess);
            })
        }
    }};
    var currentMessageList = new Chat.Collections.messageCollection();
    currentMessageList.fetch(options);

}

jQuery(document).ready(function(){
    jQuery('#message-add-button').click(function(){
        console.log(jQuery('#message-text-field').val());
    })
})



