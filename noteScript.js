window.onload = function()
{
    var notesBtn = document.getElementById("notesBtn");
    let noteTextBox = document.getElementById("noteTextBox")

    var httprequest;

    notesBtn.addEventListener('click', function(element)
    {
        element.preventDefault();

        let note = noteTextBox.value
        let listing = document.getElementById("listing")
        let list = document.createElement("li")
        
        const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        var date = new Date();
        let monthName = month[date.getMonth()];
        var currDate = (monthName)+" "+date.getDate()+", "+date.getFullYear();
        
        var hours = date.getHours();
        var am_pm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12;

        var time = hours +''+ am_pm;
        var date_time = currDate +" "+ "at"+ " "+time;
        
        list.innerHTML=`${note}`+"<br>" + `${date_time}`+"<br>" + "<br>" + "<br>" + "<br>"
        listing.insertBefore(list,listing.child)

        noteTextBox.value = ""
    });
}