export let popper;

export function showPopper(target, content) {
    hidePopper();

    popper = new bootstrap.Popover(target, {
        placement: "top",
        trigger: "manual",
        content: content
    });

    popper.show();
}

export function hidePopper() {
    if (popper != null) {
        popper.hide();
    }
}