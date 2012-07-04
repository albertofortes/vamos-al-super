(function ($) {

 
    //model:
    var List = Backbone.Model.extend({
        defaults: {
            picture: "../assets/images/html/basket.png",
            name: "",
            description: "sin descripción",
            date: "",
            status: ""
        }
    });

    
    //collections
    var ListCollection = Backbone.Collection.extend({
        model: List
    });
    
    // vista de cada item de la lista
    var ListView = Backbone.View.extend({
        tagName: "div",
        className: "list-container clearfix",
        template: $("#lists").html(),
                
        render: function () {
            var tmpl = _.template(this.template);
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
        
    });
    
    //vista de todas uLists
    var ListsView = Backbone.View.extend({
        el: $("#myLists"),

        initialize: function () {
            this.collection = new ListCollection(theLists);
            this.$el.find("#filter").append(this.createTrigger());
            this.on("change:filterType", this.filterByType, this);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                status = item.get('status');
                if (status==0) {
                	that.renderULists(item);
                }
            }, this);
        },
        
        renderULists: function (item) {
            var listView = new ListView({
                model: item
            });
            this.$el.append(listView.render().el);
            
        },
        
        events: {
	     	 "change #filter select": "setFilter"
        },
        
        createTrigger: function () {
	        //var link =  "<a id=\"showCompleted\" title=\"Mis listas de la compra hechas\" href=\"javascript:void(0)\">Mis ya compradas</a>";	        
	        select = $("<select/>", {
                    html: "<option value='0'>Pendientes</option><option value='all'>Todas</option><option value='1'>Completadas</option>"
                });
	        return select;	        
        },
        
        setFilter: function (e) {
            this.filterType = e.currentTarget.value;
            this.trigger("change:filterType");
        },
        
        filterByType: function () {
            var that = this;
            $('.list-container').remove()
            if (this.filterType === "all") {
                _.each(this.collection.models, function (item) {
	                that.renderULists(item);
	            }, this);
            } else if (this.filterType === "1") {
                 _.each(this.collection.models, function (item) {
	                status = item.get('status');
	                if (status==1) {
	                	that.renderULists(item);
	                }
	            }, this);
            } else {
	            _.each(this.collection.models, function (item) {
	                status = item.get('status');
	                if (status==0) {
	                	that.renderULists(item);
	                }
	            }, this);
            }
        }
        
        
        
    });
    
    //intanciar ListsView
    var myLists = new ListsView();

} (jQuery));