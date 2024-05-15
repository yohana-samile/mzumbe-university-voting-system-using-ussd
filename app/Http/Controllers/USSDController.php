<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Candidate;
    use App\Models\Vote;
    use App\Models\VotingWindow;
    use Illuminate\Support\Facades\DB;

    class USSDController extends Controller
    {
        public function handle(Request $request)
        {
            $input = $request->input('text');
            $sessionId = $request->input('sessionId');
            $phoneNumber = $request->input('phoneNumber');
            $serviceCode = $request->input('serviceCode');

            // Initialize USSD session if not existing
            $sessionData = $this->getSessionData($sessionId);

            // Parse input based on USSD session state
            switch ($sessionData['step']) {
                case 0:
                    // Welcome message
                    $response = "Welcome to MU-OVS. Enter your registration number:";
                    $sessionData['step'] = 1;
                    break;
                case 1:
                    // Validate registration number
                    $response = $this->validateRegistrationNumber($input);
                    if ($response === "Valid") {
                        $sessionData['step'] = 2;
                        $sessionData['registration_number'] = $input;
                        $response .= "\nSelect your preferred candidate for president:\n1. Candidate 1\n2. Candidate 2";
                    } else {
                        $response .= "\nEnter your registration number:";
                    }
                    break;
                // Handle other steps of the voting process
                // ...
                default:
                    $response = "Invalid input. Please try again.";
            }

            // Save USSD session data
            $this->saveSessionData($sessionId, $sessionData);

            // Return response
            return response($response);
        }

        private function validateRegistrationNumber($regNumber)
        {
            // Validate registration number against database
            $user = User::where('regstration_number', $regNumber)->first();
            if ($user) {
                return "Valid";
            } else {
                return "Invalid registration number. Try again.";
            }
        }

        // Other methods to handle different steps of the voting process

        private function getSessionData($sessionId)
        {
            // Retrieve session data from database or initialize new session if not existing
            // For simplicity, you can store session data in a database table or cache
            // Example: $sessionData = USSDSession::firstOrCreate(['session_id' => $sessionId]);
            return [
                'step' => 0,
                // Other session data
            ];
        }

        private function saveSessionData($sessionId, $sessionData)
        {
            // Save session data to database or cache
            // Example: USSDSession::updateOrCreate(['session_id' => $sessionId], $sessionData);
        }
    }
