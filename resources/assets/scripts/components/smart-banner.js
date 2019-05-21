import {is_Android} from "../util/helpers";

export default function smartBanner() {
  // Google Play Store Smartbanner
  if (is_Android() && $(".smartbanner").length > 0) {

    if (!localStorage.getItem("hasDismissedAndroidBanner")) {
      $(".smartbanner").removeClass("hide");

      $(".smartbanner-close").on("click", function(e) {
        e.preventDefault();
        $(".smartbanner").addClass("hide");
        localStorage.setItem("hasDismissedAndroidBanner", true);
      });
    }
  }
}
