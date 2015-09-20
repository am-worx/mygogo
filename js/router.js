var MainRouter = Backbone.Router.extend({

  routes: {
    "":      "goPhoneBook",    
    "edit/:id" :  "goEditPerson"
  },

  goPhoneBook: function() {
    curView = new PhoneBookView();
  },
  goEditPerson: function(id) {
    setTimeout(function(){
      curView = new EditPersonView({id : id});
    }, 0)

    // new EditPersonView({id : id});
  }

});



