$("#article_category").html(''); 

$("#article_subCategory").on("change", function () {
var cat = $(this).val();
console.log("category ? ", cat)
// // faire une requête ajax en envoyant l'id du nombre de personnes et la date
$.ajax({
url: 'getCategory',
type: 'POST',
data: 'category=' + cat
}).done(function (response) {
$("#article_category").html(response);
})
});
