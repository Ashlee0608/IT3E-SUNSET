function showService(serviceName) {
    document.getElementById("serviceResult").textContent =
        serviceName + ": Contact us to learn more about this service.";
}

function toggleFAQ(button) {
    const answer = button.nextElementSibling;
    const isExpanded = button.getAttribute("aria-expanded") === "true";

    button.setAttribute("aria-expanded", String(!isExpanded));
    answer.hidden = isExpanded;
}

document.getElementById("signupForm").addEventListener(
    "submit", function (event) {
        event.preventDefault();

        document.getElementById("signupResult").textContent =
            "The signup form is working, but account creation " +
            "requires a secure backend to save your information.";

        this.reset();
    }
);

document.getElementById("loginForm").addEventListener(
    "submit", function (event) {
        event.preventDefault();

        const accountType =
            document.getElementById("accountType").value;

        document.getElementById("loginResult").textContent =
            accountType + " login requires a secure authentication " +
            "system. This demonstration does not log you in.";

    }
);

document.getElementById("contactForm").addEventListener(
    "submit", function (event) {
        event.preventDefault();

        document.getElementById("contactResult").textContent =
            "Your message has been validated, but has not been sent. " +
            "Connect this form to a backend or email service to send it.";

        this.reset();
    }
)
