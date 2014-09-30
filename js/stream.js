(function($) {
  var Twitch = Twitch || {
    grabStreams: function() {
      $.ajax({
        url: "https://api.twitch.tv/kraken/streams",
        jsonp: "callback",
        dataType: "jsonp",
        data: {
          'channel': "thecatsman,evilagram",
        },
        success: this.appendStream,
        context: this,
      });
    },

    appendStream: function(data) {
      this.channel = 'thecatsman';

      if (data.streams.length > 0) {
        this.channel = data.streams[0].channel.name;
      }

      $(".stream").append(this.stream());
      $(".chat").append(this.chat());
    },

    stream: function() {
      return '<object type="application/x-shockwave-flash" height="100%" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=' + this.channel + '" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=www.twitch.tv&channel=thecatsman&auto_play=true&start_volume=100" /></object>';
    },

    chat: function() {
      return '<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://www.twitch.tv/chat/embed?channel=' + this.channel + '&amp;popout_chat=true" height="100%" width="100%"></iframe>';
    },
  };

  Twitch.grabStreams();
})(jQuery);
