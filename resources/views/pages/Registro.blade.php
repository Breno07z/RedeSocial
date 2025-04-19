<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/index.css">
    <link rel="stylesheet" href="/assets/registro.css">
    <title>HEALTHCONNECT - Registro</title>
</head>
<body>
    <div class="container">
        <h1>Crie sua conta no HEALTHCONNECT</h1>
        
        <form id="registerForm" action="/register" method="POST">
            @csrf
                <h2>Informações Básicas</h2>
                <label for="name" class="required">Nome Completo</label>
                <input type="text" id="name" name="name" required>
                
                <label for="username">Nome de usuário</label>
                <input type="text" name="username" id="username" required>
                
                <label for="email" class="required">E-mail</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password" class="required">Senha</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirmation" class="required">Confirmar Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                
                <label for="birthDate">Data de Nascimento</label>
                <input type="date" id="birthDate" name="birthDate">
            </div>
            
            <!-- Opção para preencher informações médicas -->
            <div class="form-section">
                <label class="checkbox-label">
                    <input type="checkbox" id="fillMedicalInfo"> Desejo preencher informações médicas agora
                </label>
            </div>
            
            <!-- Formulário médico (inicialmente oculto) -->
            <div id="medicalForm" class="medical-form">
                <div class="form-section">
                    <h2>Informações Médicas</h2>
                    
                    <label for="bloodType">Tipo Sanguíneo</label>
                    <select id="bloodType" name="bloodType">
                        <option value="">Selecione</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    
                    <label>Tem alguma alergia?</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="radio" name="hasAllergy" value="no" checked> Não
                        </label>
                        <label class="checkbox-label">
                            <input type="radio" name="hasAllergy" value="yes"> Sim
                        </label>
                    </div>
                    
                    <div id="allergyDetails" style="display: none;">
                        <label for="allergies">Quais alergias?</label>
                        <textarea id="allergies" name="allergies" placeholder="Ex: Penicilina, amendoim, poeira..."></textarea>
                    </div>
                </div>
                
                <div class="form-section">
                    <label>Toma algum remédio controlado?</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="radio" name="hasMedication" value="no" checked> Não
                        </label>
                        <label class="checkbox-label">
                            <input type="radio" name="hasMedication" value="yes"> Sim
                        </label>
                    </div>
                    
                    <div id="medicationDetails" style="display: none;">
                        <label for="medicationName">Nome do medicamento</label>
                        <input type="text" id="medicationName" name="medicationName" placeholder="Ex: Losartana 50mg">
                        
                        <label for="medicationFrequency">Frequência</label>
                        <select id="medicationFrequency" name="medicationFrequency">
                            <option value="daily">Diariamente</option>
                            <option value="weekly">Semanalmente</option>
                            <option value="monthly">Mensalmente</option>
                            <option value="as_needed">Quando necessário</option>
                        </select>
                        
                        <label class="checkbox-label">
                            <input type="checkbox" id="needsReminder"> Desejo receber lembretes para tomar este medicamento
                        </label>
                        
                        <div id="reminderTimes" class="medication-time">
                            <label>Horários para lembrete</label>
                            <div class="time-inputs" id="timeInputsContainer">
                                <!-- Horários serão adicionados aqui dinamicamente -->
                            </div>
                            <button type="button" class="add-time" id="addTimeBtn">+ Adicionar horário</button>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <label>Condições médicas conhecidas</label>
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="conditions" value="hypertension"> Hipertensão
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="conditions" value="diabetes"> Diabetes
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="conditions" value="asthma"> Asma
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="conditions" value="heart_disease"> Doença cardíaca
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="conditions" value="other"> Outra
                        </label>
                    </div>
                    
                    <div id="otherCondition" style="display: none;">
                        <label for="otherConditionText">Qual?</label>
                        <input type="text" id="otherConditionText" name="otherConditionText">
                    </div>
                </div>
                
                <div class="form-section">
                    <label for="emergencyContact">Contato de emergência</label>
                    <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Nome e telefone">
                    
                    <label for="notes">Observações adicionais</label>
                    <textarea id="notes" name="notes" placeholder="Outras informações relevantes..."></textarea>
                </div>
            </div>
            <p>Tem uma conta? <a href="{{ route('login') }}">Clique aqui pra voltar</a></p>
            <button type="submit">Criar conta</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const medicalCheckbox = document.getElementById('fillMedicalInfo');
        const medicalForm = document.getElementById('medicalForm');

        medicalCheckbox.addEventListener('change', function () {
            medicalForm.style.display = this.checked ? 'block' : 'none';
        });

        const allergyRadios = document.querySelectorAll('input[name="hasAllergy"]');
        const allergyDetails = document.getElementById('allergyDetails');

        allergyRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                allergyDetails.style.display = this.value === 'yes' ? 'block' : 'none';
            });
        });

        const medicationRadios = document.querySelectorAll('input[name="hasMedication"]');
        const medicationDetails = document.getElementById('medicationDetails');

        medicationRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                medicationDetails.style.display = this.value === 'yes' ? 'block' : 'none';
            });
        });

        const reminderCheckbox = document.getElementById('needsReminder');
        const reminderTimes = document.getElementById('reminderTimes');

        reminderCheckbox.addEventListener('change', function () {
            reminderTimes.style.display = this.checked ? 'block' : 'none';
        });

        const addTimeBtn = document.getElementById('addTimeBtn');
        const timeInputsContainer = document.getElementById('timeInputsContainer');

        addTimeBtn.addEventListener('click', function () {
            const timeDiv = document.createElement('div');
            timeDiv.className = 'time-input';

            const timeInput = document.createElement('input');
            timeInput.type = 'time';
            timeInput.name = 'reminderTime[]';
            timeInput.required = true;

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'remove-time';
            removeBtn.textContent = '×';
            removeBtn.addEventListener('click', function () {
                timeDiv.remove();
            });

            timeDiv.appendChild(timeInput);
            timeDiv.appendChild(removeBtn);
            timeInputsContainer.appendChild(timeDiv);
        });

        const conditionCheckboxes = document.querySelectorAll('input[name="conditions"]');
        const otherCondition = document.getElementById('otherCondition');

        conditionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.value === 'other') {
                    otherCondition.style.display = this.checked ? 'block' : 'none';
                }
            });
        });

        const form = document.getElementById('registerForm');
        form.addEventListener('submit', function (e) {
            // Validação básica sem impedir o envio real
            if (!form.name.value || !form.email.value || !form.password.value) {
                e.preventDefault();
                alert('Por favor, preencha os campos obrigatórios');
                return;
            }

            // Apenas para debug antes de enviar
            console.log('Formulário sendo enviado com:', {
                name: form.name.value,
                email: form.email.value,
                password: form.password.value,
                birthDate: form.birthDate.value,
                medicalInfo: medicalCheckbox.checked ? {
                    bloodType: form.bloodType.value,
                    hasAllergy: document.querySelector('input[name="hasAllergy"]:checked').value,
                    allergies: form.allergies?.value,
                    hasMedication: document.querySelector('input[name="hasMedication"]:checked').value,
                    medicationName: form.medicationName?.value,
                    medicationFrequency: form.medicationFrequency?.value,
                    needsReminder: reminderCheckbox.checked,
                    reminderTimes: Array.from(document.querySelectorAll('input[name="reminderTime[]"]')).map(input => input.value),
                    conditions: Array.from(document.querySelectorAll('input[name="conditions"]:checked')).map(cb => cb.value),
                    otherCondition: form.otherConditionText?.value,
                    emergencyContact: form.emergencyContact.value,
                    notes: form.notes.value
                } : null
            });
        });
    });
</script>
    
    <script src="/assets/libs/jquery/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>