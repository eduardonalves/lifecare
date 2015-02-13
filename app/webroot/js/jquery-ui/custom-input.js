$.widget( "custom.catcomplete", $.ui.autocomplete, {
    _renderMenu: function( ul, items ) {
      var that = this,
        currentCategory = "";
      $.each( items, function( index, item ) {
        if ( item.category != currentCategory ) {
          ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
          currentCategory = item.category;
        }
        that._renderItemData( ul, item );
      });
    }
  });
  
$(function() {
    var data = [
      { label: "anders", category: "" },
      { label: "andreas", category: "" },
      { label: "antal", category: "" },
      { label: "annhhx10", category: "" },
      { label: "annk K12", category: "" },
      { label: "annttop C13", category: "" },
      { label: "anders andersson", category: "" },
      { label: "andreas andersson", category: "" },
      { label: "andreas johnson", category: "" }
    ];
 
    $( "#search" ).catcomplete({
      delay: 0,
      source: data
    });
  });
