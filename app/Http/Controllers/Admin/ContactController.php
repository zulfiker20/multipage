<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    // Contact List
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('admin.contact.index', compact('contacts'));
    }

    // Store Contact
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $contact = new Contact();
        $contact->fill($validated);
        $contact->save();

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Contact created successfully.');
    }

    // Delete Contact
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
