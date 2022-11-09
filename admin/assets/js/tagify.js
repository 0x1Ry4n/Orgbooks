function setWithDefaultList(input, max, list=null) {
    var tagify = new Tagify(input, {
        mode: 'select', 
        whitelist: list,  
        dropdown: {
            position: "manual",
            maxItems: Infinity,
            enabled: 0        
        },
        templates: {
            dropdownItemNoMatch() {
                return "<div class='empty'>Tag não encontrada!</div>";
            }
        },
        enforceWhitelist: true,

        validate: function () {
            if (!tagify || tagify.value.length < max) {
                //tagify is being initialized, or max tags hasn't been reached
                return true;
            } 
        }
        })

    renderSuggestionsList() // defined down below

    function renderSuggestionsList() {
        tagify.dropdown.show() // load the list
        tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown)
    }
}

function setTagifyValues(input, max) {
    var tagify = new Tagify(input, {
        pattern: /^[A-zÀ-ÖØ-öø-ÿ\s]+$/, 

        validate: function () {
            if (!tagify || tagify.value.length < max) {
                //tagify is being initialized, or max tags hasn't been reached
                return true;
            } 
        }
    });
}