pipeline {
    agent any
    
    stages {
        stage('Build') {
            steps {
                echo 'Building Divine Health Rwanda Application...'
                sh 'docker-compose build'
            }
        }
        
        stage('Test') {
            steps {
                echo 'Running tests for Divine Application...'
                sh 'docker-compose run divine-web php -v'
                sh 'docker-compose run divine-db mysql --version'
            }
        }
        
        stage('Deploy') {
            steps {
                echo 'Deploying Divine Application...'
                sh 'docker-compose up -d'
                echo 'Divine Application deployed successfully!'
                echo 'Access points:'
                echo 'Web Application: http://localhost:8080'
                echo 'phpMyAdmin: http://localhost:8081'
                echo 'MySQL: localhost:3306'
            }
        }
    }
    
    post {
        always {
            echo 'Divine Pipeline execution completed'
        }
        success {
            echo 'Divine Application deployed successfully!'
        }
        failure {
            echo 'Divine Application deployment failed!'
        }
    }
}