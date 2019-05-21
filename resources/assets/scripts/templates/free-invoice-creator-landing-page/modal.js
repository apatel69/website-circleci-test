import {is_Android} from "../../util/helpers";
import {is_iOS} from "../../util/helpers";

export default function() {
    if (is_Android() || is_iOS()){
        document.getElementById("fic-mobile-modal").classList.replace("show-modal--false","show-modal--true");
        document.getElementById("root").classList.replace("show-app--true","show-app--false");
    }
}
  