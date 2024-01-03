<?php

namespace App\Livewire\Permit\Panel;

use App\Models\Payment;
use App\Models\Permit;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class AssessmentPermit extends Component
{
    public $id;
    public $crytd;
    public $applicationtype;
    public $organizationtype;
    public $foramendment;
    
    public $grosssalestax;
    public $deliverytax;
    public $peanltysurcharges;
    public $signboardstax;
    public $occupationtax;
    public $documentarytax;
    public $amusementtax;
    public $businessplate;
    public $sealingfee;
    public $others;
    public $mayorspermit;
    public $sanitaryinspection;
    public $buildinginspection;
    public $mechanicalinspection;
    public $sbrenewal;
    public $marketfee;
    public $fareadjustment;
    public $electricalinspection;
    public $plumblinginspection;
    public $applicationfilling;
    public $parking;
    public $franchise;
    public $fillingammendment;
    public $stickerfee;
    public $deliverypermit;
    public $annualinspection;
    public $electronicfee;
    public $annualbuilding;
    public $policeclearance;
    public $certification;

    public function assess_permit(): void
    {
        $this->crytd = Crypt::decrypt($this->id);
        
        $validated = $this->validate([
            'applicationtype' => ['required', 'string', 'max:255'],
            'organizationtype' => ['required', 'string', 'max:255'],
            'foramendment' => ['max:255'],
            'grosssalestax' => ['nullable','numeric'],
            'deliverytax' => ['nullable','numeric'],
            'peanltysurcharges' => ['nullable','numeric'],
            'signboardstax' => ['nullable','numeric'],
            'occupationtax' => ['nullable','numeric'],
            'documentarytax' => ['nullable','numeric'],
            'amusementtax' => ['nullable','numeric'],
            'businessplate' => ['nullable','numeric'],
            'sealingfee' => ['nullable','numeric'],
            'others' => ['nullable','numeric'],
            'mayorspermit' => ['nullable','numeric'],
            'sanitaryinspection' => ['nullable','numeric'],
            'buildinginspection' => ['nullable','numeric'],
            'mechanicalinspection' => ['nullable','numeric'],
            'sbrenewal' => ['nullable','numeric'],
            'marketfee' => ['nullable','numeric'],
            'fareadjustment' => ['nullable','numeric'],
            'electricalinspection' => ['nullable','numeric'],
            'plumblinginspection' => ['nullable','numeric'],
            'applicationfilling' => ['nullable','numeric'],
            'parking' => ['nullable','numeric'],
            'franchise' => ['nullable','numeric'],
            'fillingammendment' => ['nullable','numeric'],
            'stickerfee' => ['nullable','numeric'],
            'deliverypermit' => ['nullable','numeric'],
            'annualinspection' => ['nullable','numeric'],
            'electronicfee' => ['nullable','numeric'],
            'annualbuilding' => ['nullable','numeric'],
            'policeclearance' => ['nullable','numeric'],
            'certification' => ['nullable','numeric'],
        ]);


        
        $permit = Permit::where('business_id','=',$this->crytd)->first();
        $permit->applicationtype = $validated['applicationtype'];
        $permit->organizationtype = $validated['organizationtype'];
        $permit->foramendment = $validated['foramendment'];
        $permit->save();

        if($validated['grosssalestax']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Gross Sales Tax'],
                ['price' => $validated['grosssalestax'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['deliverytax']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Tax on Delivery Vans/Trucks'],
                ['price' => $validated['deliverytax'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['peanltysurcharges']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Penalty/Surcharges'],
                ['price' => $validated['peanltysurcharges'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['signboardstax']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Tax on Signbords/Billboards'],
                ['price' => $validated['signboardstax'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['occupationtax']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Occupation/Professional Tax'],
                ['price' => $validated['occupationtax'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['documentarytax']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Documentary Stamp Tax'],
                ['price' => $validated['documentarytax'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['amusementtax']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Amusement Tax'],
                ['price' => $validated['amusementtax'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['businessplate']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Business Plate'],
                ['price' => $validated['businessplate'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['sealingfee']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Sealing Fee for Weights & Measures'],
                ['price' => $validated['sealingfee'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['others']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Others'],
                ['price' => $validated['others'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['mayorspermit']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Mayors Permit Fee'],
                ['price' => $validated['mayorspermit'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['sanitaryinspection']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Sanitary Inspection Fee'],
                ['price' => $validated['sanitaryinspection'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['buildinginspection']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Building Inspection Fee'],
                ['price' => $validated['buildinginspection'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['mechanicalinspection']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Mechanical Inspection Fee'],
                ['price' => $validated['mechanicalinspection'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['sbrenewal']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Signboard/Billboard Renewal Fee'],
                ['price' => $validated['sbrenewal'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['marketfee']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Market Fee'],
                ['price' => $validated['marketfee'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['fareadjustment']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Fare Adjustment Fee'],
                ['price' => $validated['fareadjustment'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['electricalinspection']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Electrical Inspection Fee'],
                ['price' => $validated['electricalinspection'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['plumblinginspection']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Plumbing Inspection Fee'],
                ['price' => $validated['plumblinginspection'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['applicationfilling']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Application Filling Fee'],
                ['price' => $validated['applicationfilling'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['parking']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Parking Fee'],
                ['price' => $validated['parking'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['franchise']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Franchise Fee'],
                ['price' => $validated['franchise'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['fillingammendment']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Filing Fee for Ammendment of MTOP'],
                ['price' => $validated['fillingammendment'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['stickerfee']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Sticker/Confirmation Fee'],
                ['price' => $validated['stickerfee'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['deliverypermit']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Delivery Vans/Trucks Permit Fee'],
                ['price' => $validated['deliverypermit'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['annualinspection']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Annual Inspection Fee'],
                ['price' => $validated['annualinspection'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['electronicfee']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Electronic Fee'],
                ['price' => $validated['electronicfee'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['annualbuilding']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Annual Building Code Fee'],
                ['price' => $validated['annualbuilding'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['policeclearance']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Police Clearance Fee'],
                ['price' => $validated['policeclearance'], 'calendar_year' => date("Y")]
            );
        }
        if($validated['certification']>0){
            $payment = Payment::updateOrCreate(
                ['user_id' => $permit->user_id, 'business_id' => $permit->business_id, 'permit_id' => $permit->id, 'fee' => 'Certification Fee'],
                ['price' => $validated['certification'], 'calendar_year' => date("Y")]
            );
        }
    
    
    session()->flash('message', 'Fees applied.');

        $this->redirect('/panel/users');
    }

    public function go_back()
    {
        $this->redirect('/panel/users');
    }

    public function render()
    {
        $this->crytd = Crypt::decrypt($this->id);
        return view('livewire.permit.panel.assessment-permit')->layout('layouts.app');
    }
}
