pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/NyopiWulandari15/KSI2025-2.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install'
            }
        }

        stage('Run PHPUnit Tests') {
            steps {
                sh './vendor/bin/phpunit test'
            }
        }

    }
}
