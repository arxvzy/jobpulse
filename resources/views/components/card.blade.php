<!-- Card -->
<div class="mt-12 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Need Help Registering?</h3>
        <p class="text-sm text-gray-600 mb-4">
            Click the button below to learn more about the registration process.
        </p>
        <button onclick="openModal()"
            class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition">
            Show Instructions
        </button>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">
            &times;
        </button>
        <h4 class="text-xl font-semibold text-gray-900 mb-2">Registration Instructions</h4>
        <p class="text-sm text-gray-700">
            Fill in all the fields including your full name, username, email, password, and role.
            Make sure your email is valid and your password is secure.
            After submitting, you’ll be redirected to your dashboard.
        </p>
    </div>
</div>

<!-- JavaScript -->
<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>
