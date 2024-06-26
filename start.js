import { exec } from 'child_process';
import os from 'os';
import dotenv from 'dotenv';


// Load environment variables from .env file
dotenv.config();

// Get the local network IP address
const networkInterfaces = os.networkInterfaces();
let localIP = '127.0.0.1';

for (const interfaceName of Object.keys(networkInterfaces)) {
    for (const network of networkInterfaces[interfaceName]) {
        if (network.family === 'IPv4' && !network.internal) {
            localIP = network.address;
            break;
        }
    }
}

// Use the IP from environment variables if provided
const HOST = process.env.HOST || localIP;
const PORT = process.env.PORT || 8000;

// Run nodemon with the appropriate command
const command = `nodemon --exec "php artisan serve --host=${HOST} --port=${PORT}"`;

exec(command, (error, stdout, stderr) => {
    if (error) {
        console.error(`Error executing command: ${error.message}`);
        return;
    }

    if (stderr) {
        console.error(`stderr: ${stderr}`);
        return;
    }

    console.log(`stdout: ${stdout}`);
});