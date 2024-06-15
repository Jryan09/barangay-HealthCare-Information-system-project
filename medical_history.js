
    function showForm(formType) {
        const updateReadForms = document.getElementById('update-read-forms'); const dynamicFormContainer = document.getElementById('dynamic-form-container');

        function showForm(formType) {
            const createForm = document.getElementById('medical-history-form');
            dynamicFormContainer.innerHTML = ''; // Clear the dynamic form container
    
            if (formType === 'create') {
                createForm.style.display = 'block'; const dynamicFormContainer = document.getElementById('dynamic-form-container');

                function showForm(formType) {
                    const createForm = document.getElementById('medical-history-form');
                    dynamicFormContainer.innerHTML = ''; // Clear the dynamic form container
            
                    if (formType === 'create') {
                        createForm.style.display = 'block';
                    } else {
                        createForm.style.display = 'none';
            
                        // Dynamically generate the Update or Read form based on formType
                        const dynamicForm = document.createElement('form');
                        dynamicForm.method = 'post';
                        dynamicForm.action = '';
            
                        if (formType === 'update') {
                            // Your update form fields go here
                        } else if (formType === 'read') {
                            // Your read-only form fields go here
                        }
            
                        dynamicFormContainer.appendChild(dynamicForm);
                    }
                }
            } else {
                createForm.style.display = 'none';
    
                // Dynamically generate the Update or Read form based on formType
                const dynamicForm = document.createElement('form');
                dynamicForm.method = 'post';
                dynamicForm.action = '';
    
                if (formType === 'update') {
                    // Your update form fields go here
                } else if (formType === 'read') {
                    // Your read-only form fields go here
                }
    
                dynamicFormContainer.appendChild(dynamicForm);
            }
        }
        const medicalHistoryForm = document.getElementById('medical-history-form');

        if (formType === 'create') {
            updateReadForms.style.display = 'none';
            medicalHistoryForm.style.display = 'block';
        } else {
            medicalHistoryForm.style.display = 'none';

            // Depending on the form type, you can dynamically generate or fetch the respective form fields and insert them into updateReadForms.
            if (formType === 'update') {
                updateReadForms.innerHTML = `<form method="post" action="" id="update-form">
                    <!-- Your update form fields go here -->
                </form>`;
            } else if (formType === 'read') {
                updateReadForms.innerHTML = `<form method="post" action="" id="read-form" readonly>
                    <!-- Your read-only form fields go here -->
                </form>`;
            }

            updateReadForms.style.display = 'block';
        }
    }

