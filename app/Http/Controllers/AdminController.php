<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\User;
use App\Models\DetailDemande;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!$request->user()->isAdmin()) {
                abort(403, 'Accès non autorisé');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $stats = [
            'total_demandes' => Demande::count(),
            'pending_demandes' => Demande::where('status', 'pending')->count(),
            'approved_demandes' => Demande::where('status', 'approved')->count(),
            'rejected_demandes' => Demande::where('status', 'rejected')->count(),
            'total_teachers' => User::where('is_admin', 0)->count(),
            'total_lycees' => DB::table('lycees')->count(),
        ];

        $recent_demandes = Demande::with(['professeur', 'detailDemandes.lycee'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $demandes_by_status = Demande::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        return view('admin.dashboard', compact('stats', 'recent_demandes', 'demandes_by_status'));
    }

    public function demandes()
    {
        $demandes = Demande::with(['professeur', 'detailDemandes.lycee'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.demandes', compact('demandes'));
    }

    public function showDemande($id)
    {
        $demande = Demande::with(['professeur.lycee', 'detailDemandes.lycee'])
            ->findOrFail($id);

        return view('admin.show-demande', compact('demande'));
    }

    public function updateDemandeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->back()->with('success', 'Statut de la demande mis à jour avec succès.');
    }

    public function teachers()
    {
        $teachers = User::where('is_admin', 0)
            ->with(['lycee', 'demandes'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.teachers', compact('teachers'));
    }

    public function analytics()
    {
        $demandes_by_month = Demande::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $top_lycees = DB::table('detail_demandes')
            ->join('lycees', 'detail_demandes.idLycee', '=', 'lycees.idLycee')
            ->select('lycees.nomLycee', 'lycees.ville', DB::raw('COUNT(*) as demandes_count'))
            ->groupBy('lycees.idLycee', 'lycees.nomLycee', 'lycees.ville')
            ->orderBy('demandes_count', 'desc')
            ->limit(10)
            ->get();

        return view('admin.analytics', compact('demandes_by_month', 'top_lycees'));
    }
}