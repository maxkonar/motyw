jQuery(document).ready(function() {
    setHeightForGroups();

    jQuery(".case-studies__filter").on("click", function(){
        jQuery(".case-studies__filter").removeClass("case-studies__filter--active");
        jQuery(this).addClass("case-studies__filter--active");

        var filter = jQuery(this).data("type");
        jQuery(".case-studies__item").each(function(){
            if(filter == "all"){
                jQuery(this).show();
            }else{
                types = jQuery(this).data("type").split(",");
                if(types.includes(filter)){
                    jQuery(this).show();
                }else{
                    jQuery(this).hide();
                }
            }
        });

        let blockCount = jQuery('.case-studies__group .case-studies__item').filter(function() {
            return jQuery(this).css('display') === 'block';
        }).length;

        if(blockCount < 3){
            jQuery(".case-studies__group").css({"flex-direction": "unset", "flex-wrap": "unset"});
        }else{
            jQuery(".case-studies__group").css({"flex-direction": "column", "flex-wrap": "wrap"});
        }
    });
})

function setHeightForGroups(){
    if(jQuery(window).width() < 768){
        return;
    }
    jQuery('.case-studies__group').each(function(){
        totalHeight = jQuery(this).outerHeight(true);
        itemsCount = jQuery(this).children('.case-studies__item').length;
        if(itemsCount > 3){
            jQuery(this).height(totalHeight / 2);
        }
        
    });
}

