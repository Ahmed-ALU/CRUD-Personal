// To make the id of the hero uneditable
let id = $("input[name*='hero_id']")
id.attr("readonly","readonly");
// -------------------------------------


// Here we catch the button click to create an array of the data and write it in each column
$(".btnedit").click( e =>{
    let textvalues = ShowData(e);

    let id = $("input[name*='hero_id']");
    let supername = $("input[name*='hero_supername']");
    let realname = $("input[name*='hero_realname']");
    let bio = $("input[name*='hero_bio']");

    id.val(textvalues[0]);
    supername.val(textvalues[1]);
    realname.val(textvalues[2]);
    bio.val(textvalues[3]);

});

// this function is to show the data that we have on the table from the database 
function ShowData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        // checks if the id of the icon/img = id of the data
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}