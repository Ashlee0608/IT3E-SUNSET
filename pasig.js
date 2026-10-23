function productInquiry(product) {
    document.getElementById("inquiryMessage").value =
        "I would like to ask about " + product + ". Please provide details and pricing.";

    document.getElementById("contact").scrollIntoView({
        behavior: "smooth"
    });
}

function serviceRequest(service) {
    document.getElementById("serviceType").value = service;

    document.getElementById("booking").scrollIntoView({
        behavior: "smooth"
    });
}

function submitBooking(event) {
    event.preventDefault();

    alert("Your service request form is complete. Connect a backend to save and send the request.");

    event.target.reset();
}

function submitContact(event) {
    event.preventDefault();

    alert("Your inquiry form is complete. Connect a backend to save and send the inquiry.");

    event.target.reset();
}

function loginDemo(event) {
    event.preventDefault();

    alert("This is a login interface demo. Authentication must be connected to a secure backend.");
}