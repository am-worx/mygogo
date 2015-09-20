var MainRouter = Backbone.Router.extend({

  routes: {
    "":      "goPhoneBook",    
    "edit/:id" :  "goEditPerson"
  },

  goPhoneBook: function() {
    new PhoneBookView();
  },
  goEditPerson: function(id) {
    new EditPersonView({id : id});
  }

});



