$(".custom_select").each(function() {
  let classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  let template =  '<div class="' + classes + '">';
      template += '<span class="custom_select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  $(this).wrap('<div class="custom_select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom_select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom_select").removeClass("opened");
  });
  $(this).parents(".custom_select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom_select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom_select").removeClass("opened");
  $(this).parents(".custom_select").find(".custom_select-trigger").text($(this).text());
});


