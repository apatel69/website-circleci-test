export default function() {
    if (!document.getElementById("subNavigation")){
        return;
    }else{
        const navContainer = document.getElementById("subNavigation");
        const navItems = navContainer.getElementsByClassName("subNavigation-navigationItem");
        
        for (var i = 0; i < navItems.length; i++) {
            navItems[i].addEventListener("click", function() {
                if (navContainer.querySelector('.active') !== null) {
                    navContainer.querySelector('.active').classList.remove('active');
                }
                this.classList.toggle("active");
            });
        }
    }
}