$(document).ready(function() {
    let collapseElement = $(".tc_collapse");

    collapseElement.hide();

    $(".tc_collapse_toggler").click(function() {
        let target = $(`#${$(this).data("target")}`);

        target.toggle("fast");
    });

});