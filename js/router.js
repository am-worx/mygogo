var MainRouter = Backbone.Router.extend({

  routes: {
    "":      "goPhoneBook",    
    "edit/:id" :  "goEditPerson"
  },

  goPhoneBook: function() {
    mainView.render();
  },
  goEditPerson: function(id) {
    setTimeout(function(){
      view2 = new EditPersonView({id : id});
    }, 0)
  }

});



