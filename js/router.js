var MainRouter = Backbone.Router.extend({

  routes: {
    "":      "goPhoneBook",    
    "edit/:id" :  "goEditPerson"
  },

  goPhoneBook: function() {
    //this.view1 = new PhoneBookView();
    mainView.render();
  },
  goEditPerson: function(id) {
    var self = this;
    console.log(this.view1);

    setTimeout(function(){
      view2 = new EditPersonView({id : id});
      //self.view1.remove();
    }, 0)

    // new EditPersonView({id : id});
  }

});



