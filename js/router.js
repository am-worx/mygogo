var MainRouter = Backbone.Router.extend({

  routes: {
    "":      "goPhoneBook",    
    "edit/:id" :  "goEditPerson"
  },

  goPhoneBook: function() {
    console.log(1);
    new PhoneBookView();
  },

  goEditPerson: function(id) {
    console.log(2);
    new EditPersonView({id : id});
  }

});



