var MainRouter = Backbone.Router.extend({

  routes: {
    "":      "goPhoneBook",    
    "edit/:id" :  "goEditPerson"
  },

  goPhoneBook: function() {
    new PhoneBookView();
  },
  goEditPerson: function(id) {
    setTimeout(function(){
       new EditPersonView({id : id});
    }, 0)

    // new EditPersonView({id : id});
  }

});



