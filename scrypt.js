// --- Variables ---
let currentCartTotal = 0;
const deliveryFee = 40;
const TAX_RATE = 0.05; // 5% tax

// --- Objects and Methods ---
const userContext = {
    userName: "Guest",
    isLoggedIn: false,
    location: "Not set",
    updateName: function(newName) {
        this.userName = newName;
        this.isLoggedIn = true;
    },
    updateLocation: function(newLoc) {
        this.location = newLoc;
    },
    getGreeting: function() {
        return "Hello " + this.userName + " (Location: " + this.location + ")!";
    }
};

const cart = {
    items: [],
    addItem: function(name, price) {
        this.items.push({ name: name, price: price });
        currentCartTotal += price;
        this.showTotal();
    },
    showTotal: function() {
        let totalWithTax = currentCartTotal + (currentCartTotal * TAX_RATE) + deliveryFee;
        alert("Item added! \nSubtotal: " + currentCartTotal + "Rs\nTax (5%): " + (currentCartTotal * TAX_RATE) + "Rs\nDelivery: " + deliveryFee + "Rs\nGrand Total: " + totalWithTax.toFixed(2) + "Rs");
    }
};

// --- Functions & Pop-up Boxes ---
function showWelcomeMessage() {
    alert("Welcome to our application! Enjoy the best food around.");
}

function promptUserProfile() {
    // Pop-up box: prompt for name
    let name = prompt("Please enter your name:", userContext.userName);
    if (name != null && name !== "") {
        userContext.updateName(name);
        
        // Pop-up box: prompt for location
        let loc = prompt("Where should we deliver?", "Hyderabad");
        if (loc) {
            userContext.updateLocation(loc);
        }

        alert(userContext.getGreeting() + " Your profile is set up.");
        
        let headerWelcome = document.getElementById("welcome-banner");
        if(headerWelcome) {
            headerWelcome.innerText = userContext.getGreeting();
        }
    } else {
        alert("Profile setup cancelled.");
    }
}

function addToCartWithConfirm(itemName, price) {
    // Pop-up box: confirm
    let result = confirm("Do you want to add " + itemName + " (" + price + "Rs) to your cart?");
    if (result) {
        cart.addItem(itemName, price);
    } else {
        alert("Cancelled adding " + itemName + ".");
    }
}

function handleSearch() {
    let searchInput = document.getElementById("search-input");
    if (searchInput) {
        let query = searchInput.value;
        if (query) {
            alert("Searching for: " + query + "\n(Feature coming soon!)");
        } else {
            alert("Please enter a dish or restaurant name.");
        }
    }
}

function showCategoryInfo(categoryName) {
    alert("Exploring " + categoryName + "! Check out our best sellers in this section.");
}

// --- Events Setup ---
document.addEventListener("DOMContentLoaded", function() {
    // Attach search event
    let searchBtn = document.getElementById("search-btn");
    if (searchBtn) {
        searchBtn.addEventListener("click", handleSearch);
    }
    
    // Add hover effect to all elements with class 'card' or 'item'
    let interactiveElements = document.querySelectorAll(".card, .item, .category");
    interactiveElements.forEach(el => {
        el.addEventListener("mouseover", function() {
            this.style.boxShadow = "0 8px 16px 0 rgba(0,0,0,0.3)";
            this.style.transition = "0.3s";
            this.style.cursor = "pointer";
        });
        el.addEventListener("mouseout", function() {
            this.style.boxShadow = "none";
        });
    });

    // Special event: pressing 'Enter' in search box
    let searchInput = document.getElementById("search-input");
    if (searchInput) {
        searchInput.addEventListener("keypress", function(e) {
            if (e.key === 'Enter') {
                handleSearch();
            }
        });
    }
});
