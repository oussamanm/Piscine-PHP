
let _element = document.getElementById("ft_list");
let index = 0;
/// btn add
function btn_add()
{
    var result = prompt("Enter a new to-do :","");

    if (result == "")
        return ;
    // increase div ft_list
    var hieght = _element.offsetHeight + 150;
    _element.style.height = hieght + "px";
    id = "item_" + index;
    index++;
    add_newItem(result, id);
    // add item to cookies
    var d = new Date();
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = id + "=" + result + ";" + expires;
}

/// add new item by create new element html
function add_newItem(item, id)
{
    const div = document.createElement('div');
  
    div.className = 'items';
    div.id = id;
    div.innerHTML = item;
    div.setAttribute("onclick","delet_item(id)");
    _element.insertBefore(div, _element.childNodes[0]);
}

function    delet_item(id)
{
    if (confirm('Are you sure you want to delete this item?') == false)
        return;
    var hieght = _element.offsetHeight;

    var element_todelete = document.getElementById(id);
    if (element_todelete != null)
    {
        _element.removeChild(element_todelete);
    }
    _element.style.height = (hieght - 150) + "px";
    ///delete from cookies
    var cookies = document.cookie.split(";");

    document.cookie = id+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";

}

/// upload all to_do on load of page from cookies
function load_function()
{
    var hieght = _element.offsetHeight;

    if (document.cookie.length == 0)
        return ;
    var cookies = document.cookie.split(";");
    for(i = 0; i < cookies.length; i++)
    {
        var item = cookies[i].split("=");

        add_newItem(item[1], item[0]);
        hieght += 150;
    }
    _element.style.height = hieght + "px";
}
