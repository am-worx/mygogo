var Person = Backbone.Model.extend({
  url : 'api.php'
});
var PhoneBook = Backbone.Collection.extend({
	model : Person,
	url : 'js/phonebook.json',
  //url : 'api.php'
});

var phoneBook = new PhoneBook;

phoneBook.fetch({reset : true});

//phoneBook.bind('reset', function () { console.log('phoneBook'); });

var PhoneBookView = Backbone.View.extend({
  el: "body",
  initialize : function(){
    var self = this;
    self.render();
  },
  render: function(e) {
    var self = this;

  	$.get('templates/phoneBook.html', function (data) {
        template = _.template(data);
        $(self.el).html(template({collection : phoneBook.toJSON()}));  
    }, 'html');
  }
});

var EditPersonView = Backbone.View.extend({
  el: 'body',
  initialize : function(params){
    var self = this;
    for (param in params) this[param] = params[param];
    self.render();
  },
  events : {
    'click .action-save-changes' : 'saveChanges',
    'click .action-cancel' : 'cancel'
  },
  render: function(e) {
    var self = this;

    //console.log('PhBoo', phoneBook, phoneBook.get(2), person);
    var person = (phoneBook.get(self.id)).toJSON();
    

    $.get('templates/editPerson.html', function (data) {
        template = _.template(data);
        $(self.el).html(template({person : person}));  
    }, 'html');
  },
  cancel : function() {
    router.navigate('', true);
  },
  saveChanges : function(e) {
    e.preventDefault();
    console.log('save zombie');

    var changeModel = phoneBook.get($('#personId').val());

    changeModel.set({
      name:$('#personName').val(),
      tel:$('#personTel').val()
    });

    var data = {
      id:changeModel.get('id'),
      name:changeModel.get('name'),
      tel:changeModel.get('tel')
    };
    $.post(changeModel.url, data, function(){
      router.navigate('', true);
    });
    //Backbone.sync('update', changeModel);
  }
});

var router = new MainRouter();
Backbone.history.start({pushState: false});

