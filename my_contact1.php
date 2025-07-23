<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Contacts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .avatar {
            width: 80px;
            height: 80px;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #4a5568;
        }
        .modal {
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Gestionnaire de Contacts</h1>
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="#home" class="hover:text-blue-200 transition">Accueil</a></li>
                        <li><a href="#contacts" class="hover:text-blue-200 transition">Contacts</a></li>
                        <li><a href="#add-contact" class="hover:text-blue-200 transition">Ajouter</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <section id="home" class="mb-12">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-700 mb-4">Bienvenue sur votre Gestionnaire de Contacts</h2>
                <p class="text-gray-700 mb-6">
                    Gérez facilement tous vos contacts personnels en un seul endroit. Ajoutez, modifiez, recherchez et supprimez vos contacts en quelques clics.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <i class="fas fa-user-plus text-blue-600 text-4xl mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Ajout Simple</h3>
                        <p class="text-gray-600">Ajoutez rapidement de nouveaux contacts avec toutes leurs informations.</p>
                    </div>
                    <div class="bg-green-50 p-6 rounded-lg">
                        <i class="fas fa-search text-green-600 text-4xl mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Recherche Rapide</h3>
                        <p class="text-gray-600">Trouvez instantanément le contact dont vous avez besoin.</p>
                    </div>
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <i class="fas fa-edit text-purple-600 text-4xl mb-4"></i>
                        <h3 class="font-bold text-lg mb-2">Gestion Complète</h3>
                        <p class="text-gray-600">Modifiez ou supprimez vos contacts en toute simplicité.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="add-contact" class="mb-12">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-700 mb-6">Ajouter un nouveau contact</h2>
                <form id="contactForm" class="space-y-4">
                    <input type="hidden" id="contactId">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-gray-700 font-medium mb-2">Prénom *</label>
                            <input type="text" id="firstName" name="firstName" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="lastName" class="block text-gray-700 font-medium mb-2">Nom *</label>
                            <input type="text" id="lastName" name="lastName" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Téléphone *</label>
                            <input type="tel" id="phone" name="phone" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div>
                        <label for="photo" class="block text-gray-700 font-medium mb-2">Photo (optionnel)</label>
                        <input type="file" id="photo" name="photo" accept="image/*" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" id="cancelBtn" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 hidden">
                            Annuler
                        </button>
                        <button type="submit" id="submitBtn" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section id="contacts">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-blue-700">Liste des contacts</h2>
                    <div class="relative w-64">
                        <input type="text" id="searchInput" placeholder="Rechercher par nom ou prénom..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                
                <div class="mb-6 border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px" id="viewTabs">
                        <li class="mr-2">
                            <button data-view="cards" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active">Vue Carte</button>
                        </li>
                        <li class="mr-2">
                            <button data-view="table" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Vue Tableau</button>
                        </li>
                    </ul>
                </div>
                
                <div id="cardsView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                </div>
                
                <div id="tableView" class="hidden overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 modal opacity-0 pointer-events-none">
        <div class="bg-white rounded-lg p-6 max-w-md w-full">
            <h3 class="text-xl font-bold text-red-600 mb-4">Confirmer la suppression</h3>
            <p class="text-gray-700 mb-6">Êtes-vous sûr de vouloir supprimer ce contact ? Cette action est irréversible.</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Annuler</button>
                <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Supprimer</button>
            </div>
        </div>
    </div>

    <script>
        const db = {
            connect: function() {
                return true;
            },
            
            query: function(sql, params = []) {
                if (sql.includes("SELECT")) {
                  
                    return [
                        {id: 1, firstName: "Mouhamed", lastName: "Coly", phone: "771234567", email: "mouhamed.coly@example.com", photo: null},
                        {id: 2, firstName: "Oumou", lastName: "Ba", phone: "781234567", email: "oumou.ba@example.com", photo: null},
                        {id: 3, firstName: "Kine", lastName: "Fall", phone: "701234567", email: "kine.fall@example.com", photo: null},
                        {id: 4, firstName: "Sidy", lastName: "Pouye", phone: "761234567", email: "sidypouye@example.com", photo: null}
                    ];
                } else if (sql.includes("INSERT")) {
                    return {insertId: 5};
                } else if (sql.includes("UPDATE") || sql.includes("DELETE")) {
                    return {affectedRows: 1};
                }
                
                return [];
            }
        };
        
        document.addEventListener('DOMContentLoaded', function() {
            db.connect();
            loadContacts();
            setupEventListeners();
        });
        
        function loadContacts(searchTerm = '') {
            let sql = "SELECT * FROM contacts";
            let params = [];
            
            if (searchTerm) {
                sql += " WHERE firstName LIKE ? OR lastName LIKE ?";
                params = [%${searchTerm}%, %${searchTerm}%];
            }
            
            const contacts = db.query(sql, params);
            displayContacts(contacts);
        }
        
        function displayContacts(contacts) {
            const cardsView = document.getElementById('cardsView');
            const tableBody = document.getElementById('tableBody');
            
            cardsView.innerHTML = '';
            tableBody.innerHTML = '';
            
            if (contacts.length === 0) {
                cardsView.innerHTML = '<p class="text-gray-500 col-span-full text-center py-8">Aucun contact trouvé</p>';
                tableBody.innerHTML = '<tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucun contact trouvé</td></tr>';
                return;
            }
            
            contacts.forEach(contact => {
                const card = createContactCard(contact);
                cardsView.appendChild(card);
            });
            
            contacts.forEach(contact => {
                const row = createTableRow(contact);
                tableBody.appendChild(row);
            });
        }
        
        function createContactCard(contact) {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-lg shadow-md overflow-hidden contact-card transition duration-300';
            
            const initials = (contact.firstName.charAt(0) + contact.lastName.charAt(0)).toUpperCase();
            
            card.innerHTML = `
                <div class="p-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="avatar rounded-full">
                            ${contact.photo ? <img src="${contact.photo}" alt="${contact.firstName}" class="rounded-full w-full h-full object-cover"> : initials}
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold">${contact.firstName} ${contact.lastName}</h3>
                            <p class="text-gray-600">${contact.phone}</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        ${contact.email ? <p class="text-gray-700"><i class="fas fa-envelope mr-2 text-blue-500"></i> ${contact.email}</p> : ''}
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-3 flex justify-end space-x-2">
                    <button onclick="editContact(${contact.id})" class="px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 transition">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="showDeleteModal(${contact.id})" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 transition">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            
            return card;
        }
        
        function createTableRow(contact) {
            const row = document.createElement('tr');
            
            const initials = (contact.firstName.charAt(0) + contact.lastName.charAt(0)).toUpperCase();
            
            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                            ${contact.photo ? <img src="${contact.photo}" alt="${contact.firstName}" class="rounded-full w-full h-full object-cover"> : initials}
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${contact.firstName} ${contact.lastName}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-500">${contact.phone}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-500">${contact.email || '-'}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button onclick="editContact(${contact.id})" class="text-blue-600 hover:text-blue-900 mr-3">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="showDeleteModal(${contact.id})" class="text-red-600 hover:text-red-900">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;
            
            return row;
        }
        
        function editContact(id) {
            const contact = db.query("SELECT * FROM contacts WHERE id = ?", [id])[0];
            
            if (!contact) return;
            
            document.getElementById('contactId').value = contact.id;
            document.getElementById('firstName').value = contact.firstName;
            document.getElementById('lastName').value = contact.lastName;
            document.getElementById('phone').value = contact.phone;
            document.getElementById('email').value = contact.email || '';
            
            document.getElementById('cancelBtn').classList.remove('hidden');
            document.getElementById('submitBtn').textContent = 'Mettre à jour';
            
            document.getElementById('add-contact').scrollIntoView({ behavior: 'smooth' });
        }
        
        function showDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            modal.dataset.contactId = id;
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
        }
        
        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }
        
        function deleteContact(id) {
            const result = db.query("DELETE FROM contacts WHERE id = ?", [id]);
            
            if (result.affectedRows > 0) {
                loadContacts();
                alert('Contact supprimé avec succès');
            } else {
                alert('Erreur lors de la suppression du contact');
            }
            
            hideDeleteModal();
        }
        
        function setupEventListeners() {
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const id = document.getElementById('contactId').value;
                const firstName = document.getElementById('firstName').value;
                const lastName = document.getElementById('lastName').value;
                const phone = document.getElementById('phone').value;
                const email = document.getElementById('email').value;
                const photo = document.getElementById('photo').files[0];
                
                if (id) {
                    const result = db.query(
                        "UPDATE contacts SET firstName = ?, lastName = ?, phone = ?, email = ? WHERE id = ?",
                        [firstName, lastName, phone, email, id]
                    );
                    
                    if (result.affectedRows > 0) {
                        alert('Contact mis à jour avec succès');
                        resetForm();
                        loadContacts();
                    } else {
                        alert('Erreur lors de la mise à jour du contact');
                    }
                } else {
                    const result = db.query(
                        "INSERT INTO contacts (firstName, lastName, phone, email) VALUES (?, ?, ?, ?)",
                        [firstName, lastName, phone, email]
                    );
                    
                    if (result.insertId) {
                        alert('Contact ajouté avec succès');
                        resetForm();
                        loadContacts();
                    } else {
                        alert('Erreur lors de l\'ajout du contact');
                    }
                }
            });
            
            document.getElementById('cancelBtn').addEventListener('click', resetForm);
            
            document.getElementById('searchInput').addEventListener('input', function(e) {
                loadContacts(e.target.value);
            });
            
            document.getElementById('viewTabs').addEventListener('click', function(e) {
                if (e.target.tagName === 'BUTTON') {
                    document.querySelectorAll('#viewTabs button').forEach(btn => {
                        btn.classList.remove('text-blue-600', 'border-blue-600', 'active');
                        btn.classList.add('border-transparent');
                    });
                    e.target.classList.add('text-blue-600', 'border-blue-600', 'active');
                    e.target.classList.remove('border-transparent');
                    
                    const view = e.target.dataset.view;
                    if (view === 'cards') {
                        document.getElementById('cardsView').classList.remove('hidden');
                        document.getElementById('tableView').classList.add('hidden');
                    } else {
                        document.getElementById('cardsView').classList.add('hidden');
                        document.getElementById('tableView').classList.remove('hidden');
                    }
                }
            });
            
            document.getElementById('cancelDelete').addEventListener('click', hideDeleteModal);
            document.getElementById('confirmDelete').addEventListener('click', function() {
                const id = document.getElementById('deleteModal').dataset.contactId;
                deleteContact(id);
            });
        }
        
        function resetForm() {
            document.getElementById('contactForm').reset();
            document.getElementById('contactId').value = '';
            document.getElementById('cancelBtn').classList.add('hidden');
            document.getElementById('submitBtn').textContent = 'Enregistrer';
        }
        
        window.editContact = editContact;
        window.showDeleteModal = showDeleteModal;
        //Dieuredieufey Cheikh Ahmadou Bamba
    </script>
</body>
</html>