let number_of_answer = 1;

async function addAnswer(){
    number_of_answer++;
    // <div id="answer-1">
        // <div class="input-group mb-3">
        // <div class="input-group-prepend">
        //     <div class="input-group-text">
        //     <input type="checkbox" id="is-correct-1" aria-label="Checkbox for following text input mr-1">
        //     </div>
        // </div>
        // <div class="input-group-prepend">
        //     <div class="input-group-text">
        //     <span style="color: red;" onclick="deleteAnswer('answer-1')">-</span>
        //     </div>
        // </div>
        // <input type="text" class="form-control" id="answer1" name="answers[]" placeholder="Jawaban" required>
        // </div>
    {/* </div> */}
    const answerEl = document.getElementById('answers-section')

    const header = document.createElement('div')
    header.id = `answer-${number_of_answer}`
    // header.innerHTML = `<input type="text" class="form-control" id="answer${number_of_answer}" name="answers[]" onchange="changeValueOptionCorrectAnswer('option-correct-${number_of_answer}', this)" placeholder="Jawaban" required>`

    header.innerHTML = `
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span style="color: red;" onclick="deleteAnswer('answer-${number_of_answer}')">-</span>
                </div>
            </div>
            <input type="text" class="form-control" id="answer${number_of_answer}" onChange="changeValueOptionCorrectAnswer('option-correct-${number_of_answer}', this)" name="answers[]" placeholder="Jawaban" required>
        </div>
    `
    answerEl.appendChild(header)
    console.log(number_of_answer)
    await addCorrectOptionAnswer(number_of_answer)
}
function addCorrectOptionAnswer(number_of_answer){
    // <option value="0">Pilih Jawaban Benar</option>
    const optionHeader = document.createElement('option')
    optionHeader.id = 'option-correct-'+number_of_answer
    optionHeader.value = ''

    const selectOptions = document.getElementById('option-correct-answer')
    selectOptions.append(optionHeader)
}

function changeValueOptionCorrectAnswer(id, event){
    console.log("🚀 ~ chnageValueOptionCorrectAnswer ~ event:", event.value)
    console.log("🚀 ~ chnageValueOptionCorrectAnswer ~ id:", id)
}

function deleteAnswer(el){
    console.log("🚀 ~ deleteAnswer ~ el:", el)
    let id = el.split('-')[1]

    var isSingleAnswerElement = isSingleElementWithPrefixId('answer-');
    if(!isSingleAnswerElement){
        const element = document.getElementById(el)

        const optionel = document.getElementById('option-correct-'+id)
        console.log("🚀 ~ deleteAnswer ~ optionel:", optionel)
        optionel.remove()

        console.log("🚀 ~ deleteAnswer ~ element:", element)
        element.remove()
    }
}

function getElementsByPrefixId(prefix) {
    var elements = [];
    var allElements = document.getElementsByTagName("*");
    for (var i = 0; i < allElements.length; i++) {
        var id = allElements[i].id;
        if (id && id.startsWith(prefix)) {
            elements.push(allElements[i]);
        }
    }
    return elements;
}

function isSingleElementWithPrefixId(prefix) {
    var elements = getElementsByPrefixId(prefix);
    return elements.length === 1;
}

function doChangeCorrectAnswer(){
    const checkboxes = document.querySelectorAll('.is-correct-checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxes.forEach(otherCheckbox => {
                    if (otherCheckbox !== this) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
}