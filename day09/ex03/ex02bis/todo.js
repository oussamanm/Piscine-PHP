
$(document).ready(function(){
    let _element = $("#ft_list");
    let index = 0;
    /// btn add
    function btn_add()
    {
        var result = prompt("Enter a new to-do :","");

        if (result == null || result == "")
            return ;
        // increase div ft_list
        var hieght = _element.height() + 150;
        _element.css('height' ,hieght + 'px');
        id = "item_" + index;
        index++;
        add_newItem(result, id);
        // add item to cookies
        var d = new Date();
        d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = id + "=" + result + ";" + expires;
    }

    function    delet_item()
    {
        if (confirm('Are you sure you want to delete this item?') == false)
            return;
        var hieght = _element.height();

        id = $(this).id;
        alert(id);
        if ($(this) != null)
            $(this).remove();
        _element.css('height' ,(hieght - 150) + 'px');
        ///delete from cookies
        var cookies = document.cookie.split(";");
        document.cookie = id+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
    }

    load_function();
    $("#btn_new").click(btn_add);
    $("#ft_list").on('click', '.items', delet_item);

    
    /// upload all to_do on load of page from cookies
    function    load_function()
    {
        var height = _element.height();

        if (document.cookie.length == 0)
            return ;
        var cookies = document.cookie.split(";");
        for(i = 0; i < cookies.length; i++)
        {
            var item = cookies[i].split("=");

            add_newItem(item[1], item[0]);
            height += 150;
        }
        _element.css('height' , height+'px');
    }
});

/// add new item by create new element html
function    add_newItem(item, id)
{
    $("#ft_list").append("<div class='items' id="+id+">" + item + "</div>");
}